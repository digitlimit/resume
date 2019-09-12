<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Models\User;

use Alert;

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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect to registration form
     */
    public function getLogin()
    {
        return view('guest.login', [
            'page_title' => 'Emeka Mbah - Login'
        ]);
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        /*run validation on request parameters*/
        $validator = validator($request->only(['email','password']), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //return errors to view if any
        if($validator->fails()){

            Alert::form('Invalid Email/Password','Opps')
                ->error();

            return redirect()
                ->back()
                ->withErrors($validator);
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->wantsJson())
        {
            return response()->error([
                'message'=> trans('auth.failed'),
            ]);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors, 'login');
    }



    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = $request->user();

        //guest login
        event(new OnAfterGuestLogin($user));

        //TODO: stop admins from logging from landing page
        //send user to right route
        $route = route('profile.dashboard.getIndex');

        if($user->isAdmins())
        {
            $route = route('admin.dashboard.getIndex');
        }else if($user->isStaffs()) {
            $route = route('member.dashboard.getIndex');
        }

        notice_logger('User Logged In', $user->toArray());

        return response()->success([
            'title'     => 'Login has been done',
            'message'   => 'Login has been done',
            'redirect'  => intended_url($route)
        ]);
    }
}
