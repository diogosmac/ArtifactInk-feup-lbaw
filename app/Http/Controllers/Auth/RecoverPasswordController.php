<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailService\EmailServiceController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


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

        $token = Hash::make($name . $email . $date_of_birth);

        $url = url("/reset_password/{$token}");

        
        //Create Password Reset Token
        \DB::table('recover_password_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        
        $email_service = new EmailServiceController();

        // ! redirect back with and without error (show different pages)
        if ($email_service->sendRecoverPasswordEmail($email, $name, $url)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }


    }

    public function showSetNewPasswordForm(Request $request)
    {
        // 
    }

    public function requestSetPassword(Request $request) {
        //Validate input
        /*$validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed'
            'token' => 'required' ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }*/

        $password = $request->password;// Validate the token
        $tokenData = DB::table('recover_password_tokens')->where('token', $request->token)->first();
        
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);//Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('recover_password_tokens')->where('email', $user->email)->delete();

        //Send Email Reset Success Email
        /*if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }*/
        return redirect()->intended();
    }
}
