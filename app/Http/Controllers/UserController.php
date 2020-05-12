<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use App\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
	 * Shows logged user personal infomation
	 *
	 * @return View
	 */
  public function showProfile(){ //todo consider auth - althought its already checked before 
    
    if (!Auth::check()) return redirect('/');
    
    $user = Auth::user();

    $userInfo = array(
      'name' => $user->name,
      'email' => $user->email,
      'date_of_birth' => $user->date_of_birth,
      'phone' => $user->phone
    ); 

    $countries = Country::get();

    $profilePicture = $user->profilePicture()->get()->first();

    $paymentMethods = $user->payment_methods()->get();
    $addresses = $user->addresses()->get();

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

    $profilePicture = $user->profilePicture()->get()->first();

    return view('pages.profile.edit', ['userInfo' => $userInfo, 'profilePicture' => $profilePicture]);    

  }

  public function updateProfile(Request $request){
    
    $user = Auth::user();

    $name = $request['firstName'] . ' ' .  $request['lastName'];
    $date_of_birth = $request['date_of_birth']; 
    $phone = $request['phone']; 
    $email = $request['email'];
    
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
    /*
    if( $request['password'] != null ){
      if($request['password'] == $request['passwordConfirm'] ){
        try {
          $user->update(['password' => $request['password']]);
        } catch(PDOException $e) {
          return response("Error updating user info", 409);
        }
      }else{
        return response("Failed to change Password", 409); 
      }

    }
    */
    
    try {
      $user->update(['name' => $name, 'date_of_birth' => $date_of_birth, 'email' => $email, 'phone' => $phone ]);
    } catch(PDOException $e) {
      return response("Error updating user info", 409);
    }

    return redirect()->route('profile.home');
  }

  /**
   * Show orders page
   */

  public function showOrders() {
    if (!Auth::check()) return redirect('/sign_in');

    $orders = Auth::user()->orders()->orderBy('date', 'desc')->get();
    $addresses = array();
    $items = array();
    $pictures = array();
    foreach ($orders as $order) {
      array_push($addresses, $order->address()->get()->toJson());
      
      $auxItems = $order->items()->get();
      $auxPictures = array();
      foreach ($auxItems as $item) {
				array_push($auxPictures, $item->images()->get()->first()->toJson());
      }
      array_push($items, $auxItems->toJson());
      array_push($pictures, $auxPictures);
    }

    /*print_r((array) $orders->toJson());
    print_r($addresses);
    print_r($items);
    print_r($pictures);*/

    //print("\n");$orders = json_decode(((array) $orders->toJson())[0]);
    //$addresses = json_decode($addresses[0]);
    //$items = json_decode($items[0]);

    //print_r((array) $orders->toJson());
    print("\n");
    print_r($addresses);
    print("\n");
    print_r($items);

    return view('pages.profile.purchased_history', ['orders' => (array) $orders->toJson(), 'addresses' => $addresses, 'items' => $items, 'pictures' => $pictures]);
  }

}
