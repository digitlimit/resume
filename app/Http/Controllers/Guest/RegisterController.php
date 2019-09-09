<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Notification, Mail, Hash;

use App\Models\User;
use App\Models\EmailVerification;
use App\Events\Guest\OnAfterGuestRegister;

use Illuminate\Contracts\Validation\Validator;
use App\Services\UserService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Register a guest
     *
     * @param Request $request
     * @return mixed
     */
    public function postRegister(Request $request)
    {
        //get user data from request
        $user_data = $request->only(['first_name','last_name','email','password']);

        $user_data['source'] = 'frontend';

        //attempt to register
        $response = UserService::createFrontendUser($user_data);

        //run validations
        if($response instanceof Validator){
            return response()->form($response);
        }elseif($response instanceof User){

            //user registration
            notice_logger('User Registration', $response->toArray());

            return response()->success([
                'title'   => 'Congratulations!',
                'message' => 'Registration was a success. An e-mail with activation link was sent to you'
            ]);
        }

        return response()->error([
            'title'   => 'Opps!',
            'message' => 'Something went wrong. Unable to register new user'
        ]);
    }
}