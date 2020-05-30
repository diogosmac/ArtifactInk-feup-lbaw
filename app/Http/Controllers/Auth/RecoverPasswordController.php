<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailService\EmailServiceController;
use Illuminate\Support\Facades\Hash;

class RecoverPasswordController extends Controller
{
    //

    public function showRecoverPasswordForm()
    {
        return view('auth/recover_password');
    }

    public function requestRecoverPassword(Request $request)
    {
        //You can add validation login here
        $user = User::where('email', '=', $request->email)->first(); //Check if the user exists
       
        if (!isset($user)) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        $name = $user->name;
        $email = $user->email;
        $date_of_birth = $user->date_of_birth;

        $hash = Hash::make($name . $email . $date_of_birth);

        $url = url("/reset_password/{$hash}");

        /*//Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $hash,
            'created_at' => Carbon::now()
        ]); //Get the token just created above

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();*/

        $email_service = new EmailServiceController();
        return;
        
        if ($email_service->sendRecoverPasswordEmail($email, $name, $url)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }


        // ! redirect back with and without error (show different pages)
    }

    public function showSetNewPasswordForm(Request $request)
    {
        // 
    }

    public function requestSetPassword(Request $request)
    {
        //
    }
}
