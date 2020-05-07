<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * Where to redirect admin after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        return view('auth.admin_login', [
            'title' => 'Admin Sign In',
            'sign_in_route' => 'admin.sign_in',
        ]);
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        // Validation
        $this->validator($request);

        // Login the admin
        if(Auth::guard('admin')->attempt($request->only('username','password'))){
            // Redirect the admin
            return redirect()
                ->intended(route('admin.home'))
                ->with('status','You are signed in as Admin!');
        }

        // Authentication failed
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.sign_in')
            ->with('status','Admin has been signed out!');
    }

    private function validator(Request $request) {
        //validation rules.
        $rules = [
            'username' => 'required|string|exists:admin',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'username.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed() {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }

    public function redirectTo()
    {
        return route('admin.home');
    }

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
}
