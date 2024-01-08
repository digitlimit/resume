<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\PostLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Digitlimit\Alert\Facades\Alert;
use Illuminate\Http\Response;

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
     * @param  \App\Http\Requests\Guest\PostLoginRequest $request
     * @return RedirectResponse|Response
     */
    public function postLogin(PostLoginRequest $request)
    {
//        /*run validation on request parameters*/
//        $validator = validator($request->only(['email','password']), [
//            'email' => 'required|email',
//            'password' => 'required|string',
//        ]);
//
//        //return errors to view if any
//        if($validator->fails()){
//
//            Alert::form('Invalid Email/Password','Opps')
//                ->error();
//
//            return redirect()
//                ->back()
//                ->withErrors($validator);
//        }

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
     * @param Request $request
     * @return RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {

        if ($request->wantsJson())
        {
            return response()->error([
                'message'=> trans('auth.failed'),
            ]);
        }

        Alert::message(trans('auth.failed'))
            ->tag('auth')
            ->error();

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'));
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    protected function sendLoginResponse(Request $request): RedirectResponse
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        Alert::message('Login was done')
            ->title('Congratulations')
            ->success();

        //TODO: redirect to resume index
        return redirect()->route('resume.education.index');
    }
}
