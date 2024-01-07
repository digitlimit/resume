<?php namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Models\EmailVerification;
use App\Models\EmailBlacklist;
use App\Models\User;

use App\Mail\GuestResendVerificationMail;
use App\Events\Guest\OnAfterGuestLogin;

use Mail;
use Digitlimit\Alert\Alert;

/**
 * Handle email related actions
 *
 * Class EmailController
 * @package App\Http\Controllers\Auth
 */
class EmailController extends Controller
{
    use ThrottlesLogins;

    protected $verification;
    protected $alert;

    public function __construct(EmailVerification $verification, Alert $alert)
    {
        $this->verification = $verification;
        $this->alert = $alert;
    }

    /**
     * Verify user email
     *
     * @param Request $request
     * @param $code
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request, $code, $email)
    {
        //validate parameters
        $validator = validator(['email' => $email, 'code' => $code], [
            'email' => 'required|email',
            'code'  => 'required|alpha_num',
        ]);

        /*return validation error*/
        if($validator->fails())
        {
            $this->alert->modal('Invalid verification credentials', 'Verification Failed')
                    ->error('error');

            info(['verification_failed' => 'Invalid verification credentials',
                'email' => $email, 'code' => $code]);

            return redirect()->route('landing.home.getIndex');
        }


        //user already verified
        if($this->verification->isVerified($code))
        {
            $this->alert->modal('Account already verified. Please login', 'Already verified')
                ->success();

            info(['verification_failed' => 'Already verified',
                'email' => $email, 'code' => $code]);

            return redirect()->route('landing.home.getIndex');
        }


        //verify user
        if($verification = $this->verification->verify($code, $email))
        {
            //TODO check if user is blacklisted for serious offence
            //login user
            auth()->guard()->login($verification->user);

            event(new OnAfterGuestLogin($verification->user));

            notice_logger('User verified email', $verification->user->toArray());

            //flash message
            $this->alert->modal('Thank you for verifying your e-mail address',
                "Welcome {$verification->user->first_name}! ")
                ->setActionButton('Take me to account', route('profile.dashboard.getIndex'))
                ->info();

            //redirect to member page
            return redirect()->route('landing.home.getIndex'); //TODO change
        }

        $this->alert->modal('Something is wrong with your verification code', 'Verification failed')
            ->error('error');

        return redirect()->route('landing.home.getIndex');
    }


    /**
     * Resend verification email
     *
     * @param Request $request
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resendVerificationLinkEmail(Request $request)
    {
        //validate email
        $validator = validator(['email' => $request->email], ['email'=>'required|email']);

        /*return error to view*/
        if($validator->fails()) return response()->form($validator);

        /*we wanna ensure this provided email exists in blacklist for no verification issue*/
        if(!$blacklist = EmailBlacklist::UnverifiedEmail($request->email))
        {
            return response()->error([
                'message' => 'Something is wrong with your account. Kindly contact support',
                'code'    => 'account_issue'
            ]);
        }

        /*get user from blacklist relationship*/
        $user = $blacklist->user;

        /*ensure we have a user*/
        if(!$user)
        {
            return response()->error([
                'message' => 'Something is wrong with your account. Kindly contact support',
                'code'    => 'account_issue'
            ]);
        }

        //Generate and insert verification hash into the database
        $verification_code = EmailVerification::generateCode($user);

        //lets remove user from blacklist
        EmailBlacklist::UnlistUnverifiedEmail($request->email);

        //log this error
        if(!$verification_code){
            info([__CLASS__. ' verification_code could not be generated']);
            return response()->error([
                'message' => 'Something went wrong. We are on it',
                'code'    => 'sever_issue'
            ]);
        }

        //resend email verification message to new user
        Mail::to($user)->send(new GuestResendVerificationMail($user, $verification_code));

        notice_logger('User Request Email Resend', $user->toArray());

        //return success message
        return response()->success([
            'message' => 'We just emailed you a verification link. kindly check your mail',
        ]);
    }

    /**
     * Return user name field tto be used by throttle
     * @return string
     */
    protected function username()
    {
        return 'email';
    }
}