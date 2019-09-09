<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

use App\Mail\GuestResetPasswordLinkMail;
use App\Events\Guest\OnAfterGuestLogin;

use App\Models\User;
use App\Models\EmailBlacklist;
use Mail, Alert;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected $token;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->token = $token;
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        /*validate email*/
        $validator = validator($request->only(['email']), [
            'email' => 'required|email'
        ]);

        /*validation failed*/
        if($validator->fails()) return response()->form($validator);

        /*We want to check if email is blacklisted and for what reason*/
        //TODO: complete this later
//        if($blacklist = EmailBlacklist::findByEmail($request->email))
//        {
//
//        }


        if($user = User::where('email', $request->email)->first())
        {
            $token =  $this->broker()->createToken($user);

            /*send reset password link*/
            Mail::to($user)->send(new GuestResetPasswordLinkMail($user, $token));
        }else{
            info(['email' => $request->email, 'message' => 'Password reset failed - User not found!']);
        }

        notice_logger('User Resend Email', $user->toArray());

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        return response()->success([
            'title' => 'Password Email Sent!',
            'message' => 'You will receive an email shortly but only if the provided e-mail address match our records'
        ]);
    }


    /**
     * This simple put token and email in the session,
     * then redirect to home page, session is picked up by modal form
     *
     * @param Request $request
     * @param $token
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showResetForm(Request $request, $token, $email)
    {
        //flash token and email
        $request->session()->flash('password_reset_token', $token);
        $request->session()->flash('password_reset_email', $email);

        //redirect to member page
        return redirect()->route('landing.home.getIndex');
    }


    public function postChangePassword(Request $request)
    {
        $user_data = $request->only(['email', 'password', 'password_confirmation', 'token']);
        $rules = [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ];

        /*validate user data*/
        $validator = validator($user_data, $rules, $messages=[]);
        if($validator->fails())
        {
            return response()->form($validator);
        }


        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $user_data, function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if($response != Password::PASSWORD_RESET)
        {
            info(['email' => $request->email, 'response' => $response]);
            return response()->error([
                'title' => 'Password Updated Failed!',
                'message' => 'Password could not be changed'
            ]);
        }

        //get user
        $user = User::where('email', $request->email)->first();

        notice_logger('Password Reset', $user->toArray());

        return response()->success([
            'title' => 'Password Updated!',
            'message' => 'You have successfully changed your password'
        ]);
    }



    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {

        //TODO: password hashing is done in User::setPasswordAttribute
        //TODO: remember token is set in  User::setPasswordAttribute
        //TODO: we simply save plan password and hashing is done for us
        $user->password = $password;

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);

        event(new OnAfterGuestLogin($user));

//        $user->password = Hash::make($password);
//
//        $user->setRememberToken(Str::random(60));
//
//        $user->save();
//
//        event(new PasswordReset($user));
//
//        $this->guard()->login($user);
//
//        event(new OnAfterGuestLogin($user));
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
