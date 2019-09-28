<?php namespace App\Service;

use App\Models\User as Model;

class User
{
    public static function create(array $user)
    {
        //create user
        $user = Model::create($user);

        //failure
        if(!$user) return false;

        //perform other tasks like send email
        return true;
    }
}