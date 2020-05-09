<?php

namespace App\Http\Controllers;

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

    $profilePicture = $user->profilePicture()->get()->first();

    $paymentMethods = $user->payment_methods()->get();
    $addresses = $user->addresses()->get();

    return view('pages.profile.profile', ['userInfo' => $userInfo, 'profilePicture' => $profilePicture, 'paymentMethods' => $paymentMethods, 'addresses' => $addresses]);    

  }

  public function updateProfile(){
    //todo - member to check if data its not chnaged in the db 
  }

}
