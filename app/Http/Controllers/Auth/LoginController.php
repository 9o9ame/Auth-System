<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers, VerifiesEmails;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('throttle:6,1')->only('login');
        // $this->middleware('verified')->only('login');
    }
    
    protected function authenticated($request, $user)
    {
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended($this->redirectPath());
        } else {
            // Optionally, you can customize the behavior for unverified users.
            return redirect()->route('verification.notice')
                ->with('warning', 'You need to verify your email address.');
        }
    }
}
