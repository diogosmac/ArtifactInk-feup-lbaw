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
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRecoverPasswordForm()
    {
        return view('auth/recover_password');
    }

    public function requestRecoverPassword(Request $request)
    {
        // Add validation here
        $user = User::where('email', '=', $request->email)->first(); 
        
        //Check if the user exists
        if (!isset($user)) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        $name = $user->name;
        $email = $user->email;
        $date_of_birth = $user->date_of_birth;

        $token = str_replace ('/', '%', Hash::make($name . $email . $date_of_birth));

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

    public function showResetPasswordForm($token)
    {
        $expired = false;
        // If token exipired redirect to request token
        $tokenData = \DB::table('recover_password_tokens')
                        ->where('token', $token)
                        ->where( 'created_at', '>', Carbon::now()->subMinutes(30))
                        ->orderBy('created_at', 'desc')->first();

        if (!$tokenData) {
            $expired = true;
        }

        return view('auth/reset_password', ['token' => $token, 'expired' => $expired]);
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
        $confirm_password = $request->confirm_password;
        $tokenData = \DB::table('recover_password_tokens')
                    ->where('token', $request->token)
                    ->where( 'created_at', '>', Carbon::now()->subMinutes(30))
                    ->orderBy('created_at', 'desc')->first();
        
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth/reset_password', ['token' => $token, 'expired' => true]);
        // If password is different from confirm password
        if ($password != $confirm_password) return redirect()->back()->withErrors(['password' => 'Passwords don\'t match']);


        $user = User::where('email', $tokenData->email)->first();
        
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        \Auth::login($user);

        //Delete the token
        \DB::table('recover_password_tokens')->where('email', $user->email)->delete();

        //Send Email Reset Success Email
        $email_service = new EmailServiceController();
        $email_service->sendConfirmResetPasswordEmail($user->email, $user->name);

        return redirect()->intended();
    }
}
