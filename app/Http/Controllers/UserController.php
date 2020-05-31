<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use App\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  /**
	 * Shows logged user personal infomation
	 *
	 * @return View
	 */
  public function showProfile(){ 
    
    if (!Auth::check()) return redirect('/');
    
    $user = Auth::user();

    $userInfo = array(
      'name' => $user->name,
      'email' => $user->email,
      'date_of_birth' => $user->date_of_birth,
      'phone' => $user->phone
    ); 

    $countries = Country::get();

    $profilePicture = $user->profilePicture->first();

    $paymentMethods = $user->payment_methods()->orderBy('id_payment_method')->get();
    $addresses = $user->addresses()->orderBy('id_address')->get();

    return view('pages.profile.profile', ['userInfo' => $userInfo, 'profilePicture' => $profilePicture, 'paymentMethods' => $paymentMethods, 'addresses' => $addresses, 'countries' => $countries]);    

  }

  public function showEditProfile(){ //todo consider auth - althought its already checked before 
    
    if (!Auth::check()) return redirect('/');
    
    $user = Auth::user();

    $userInfo = array(
      'name' => $user->name,
      'email' => $user->email,
      'date_of_birth' => $user->date_of_birth,
      'phone' => $user->phone
    ); 

    $profilePicture = $user->profilePicture->first();

    return view('pages.profile.edit', ['userInfo' => $userInfo, 'profilePicture' => $profilePicture]);    

  }

  public function updateProfile(Request $request){
    if (!Auth::check()) return redirect('/');
    
    $user = Auth::user();

    $name = $request['firstName'] . ' ' .  $request['lastName'];
    $date_of_birth = $request['date_of_birth']; 
    $phone = $request['phone']; 
    $email = $request['email'];
    $picture = $request['picture'];

    if($picture != null) {
      // validate image
      $this->validate($request, [
        'picture' => 'image|mimes:jpeg,jpg,png',
      ]);
      $filename = $user->profilePicture->first()->link;
      $picture->storeAs('public/img_user', $filename);
    } 
    
    //form validation
    if($user->email == $email){
      $this->validate($request, [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'phone' => 'max:9',
        'date_of_birth' => 'required|date|before:-18 years'
      ]);

    }else{   
      $this->validate($request, [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'date_of_birth' => 'required|date|before:-18 years',
        'phone' => 'max:9',
        'email' => 'required|email|unique:user' //fails here bc the emails its the same as the user 
      ]);
    } 
    
    //check if password need to be changed
    
    if( $request['password'] != null ){
      if($request['password'] == $request['passwordConfirm'] ){
        try {
          $user->update(['password' => bcrypt($request['password'])]);
        } catch(PDOException $e) {
          return response("Error updating user info", 409);
        }
      }else{
        return response("Failed to change Password", 409); 
      }

    }
    
    
    try {
      $user->update(['name' => $name, 'date_of_birth' => $date_of_birth, 'email' => $email, 'phone' => $phone ]);
    } catch(PDOException $e) {
      return response("Error updating user info", 409);
    }

    return redirect()->route('profile.home');
    
  }

  public function deleteProfile(){
    if (!Auth::check()) return redirect('/sign_in');
    
    $user = Auth::user();

    $profilePicture = $user->profilePicture->first();

    // Delete user 
    try {
      $user->delete();
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['delete' => 'Error trying to delete your account']);
    }

    // Delete profile pic if its not default
    if ($profilePicture->id != 0) {
      try {
        $profilePicture->delete();
        Storage::delete('public/img_user/' . $profilePicture->link);
      } catch (\Exception $e) {
        // ! Do something?
      }
    }

    return redirect()->intended();
  }

  /**
   * Show orders' page
   */

  public function showOrders() {
    if (!Auth::check()) return redirect('/sign_in');

    $orders = Auth::user()->orders()->orderBy('date', 'desc')->get();

    return view('pages.profile.purchased_history', ['orders' => $orders]);
  }

  /**
   * Show Checkout Pages
   */

   public function showCheckout(){
    if (!Auth::check()) return redirect('/');
    
    $user = Auth::user();

    $cartItems = CartController::get_user_cart_items()['items'];
    $countries = Country::get();
    $addresses = $user->addresses()->orderBy('id_address')->get();
    $paymentMethods = $user->payment_methods()->orderBy('id_payment_method')->get();

    return view('pages.checkout', ['cartItems'=>$cartItems, 'addresses'=>$addresses, 'countries' => $countries,'paymentMethods'=>$paymentMethods] ); 
   }

}
