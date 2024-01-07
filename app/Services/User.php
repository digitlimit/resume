<?php

namespace App\Services;

use App\Models\User as Model;

class User
{
    public static function findOrFail($id)
    {
        return Model::findOrFail($id);
    }

    public static function paginate($per_page=15)
    {
        return Model::paginate($per_page);
    }

    public static function create(array $user)
    {
        //TODO: check permission and roles

        $user['password'] = bcrypt($user['password']);

        //create user
        return Model::create($user);
    }

    public static function update(array $update_user, $id)
    {
        //TODO: check permission and roles

        if(!$update_user['password']){
            unset($update_user['password']);
        }else{
            $update_user['password'] = bcrypt($update_user['password']);
        }

        //TODO: allow change of email?
        unset($update_user['email']);

        if($user = Model::find($id)){
            return $user->update($update_user);
        }

        return null;
    }

    public static function destroy($id)
    {
        //TODO: check permission

        //TODO: don't delete admin
        if($id == 1){
            throw new \Exception('Cannot delete admin');
        }

        if($user = Model::find($id)){
            $user->delete();
        }

        return true;
    }
}
