<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {

        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'email'             => config('resume.credentials.admin.email'),
                'password'          => bcrypt(config('resume.credentials.admin.password')),
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ]
        ]);
    }

}