<?php namespace App\Service;

use App\Models\User;
use Exception;

class Message
{
    public static function find($user_id, $message_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        return $user->messages()->find($message_id);
    }

    public static function paginate($user_id, $per_page=15)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        return $user->messages()->paginate($per_page);
    }

    public static function compose(array $messages, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        $messages['ip_address'] = request()->getClientIp();

//        'name',
//        'email',
//        'subject',
//        'message',
//        'ip_address',
//        'country',
//        'other_info'

        //create messages
        return $user->messages()->create($messages);
    }

    public static function destroy($user_id, $id)
    {
        //TODO: who is deleting? check permissions and owner

        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        if(!$message = $user->messages()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $message->delete();

        return true;
    }
}