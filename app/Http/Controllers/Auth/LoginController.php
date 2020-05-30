<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Where to redirect users after login using external API.
     * 
     * @var string
     */
    protected $redirectToExternal = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUser(){
        return $request->user();
    }

    public function home() {
        return redirect('sign_in');
    }

    public function externalAuth($provider) {
        return Socialite::driver($provider)->redirect();
    }
    
    public function externalRedirect($provider) {
        
        try {
            $user = Socialite::driver($provider)->user();
        }
        catch (\Exception $e) {
            return redirect('/sign_in');
        }
        
        // if the user doesn't exist, add them
        // if they do, get the existing user
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => bcrypt($user->id),
            'date_of_birth' => '2000-01-10'
        ]);
        
        Auth::login($user, true);
        
        return redirect('/profile');
            
    }
        
    public function googleAuth() {
        return Socialite::driver('google')->redirect();
    }
    
    public function googleRedirect() {

        $user = Socialite::driver('google')->user();

        // if the user doesn't exist, add them
        // if they do, get the existing user
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => bcrypt($user->id),
            'date_of_birth' => '2000-01-10'
        ]);

        Auth::login($user, true);

        return redirect('/profile');

    }

    public function facebookAuth() {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect() {
        $user = Socialite::driver('facebook')->user();
        dd($user);

        // if the user doesn't exist, add them
        // if they do, get the existing user
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => bcrypt($user->id),
            'date_of_birth' => '2000-01-10'
        ]);

        Auth::login($user, true);

        return redirect('/profile');

    }

}
