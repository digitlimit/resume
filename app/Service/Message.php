<?php namespace App\Service;

use App\Models\Message as Model;
use App\Models\User;
use Exception;

class Message
{

    public static function default()
    {
        return Model::find(1);
    }

    public static function create(array $message, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        //create Message
        $message = $user->message()->create($message);

        //failure
        if(!$message) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $message, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        //create Message
        $message = $user->message()->update($message);

        //failure
        if(!$message) return false;

        //perform other tasks like send email
        return true;
    }
}