<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CreateUsersSeeder
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
                'phone'=>'01831763868',
                'student_id'=>'710002952',
                'status'=>'active',

            ],
            [
                'name'=>'psychologist',
                'email'=>'psycho@gmail.com',
                'is_admin'=>'3',
                'password'=> bcrypt('123456'),
                'phone'=>'01831763868',
                'student_id'=>'710002953',
                'status'=>'active',
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'phone'=>'01831763868',
                'student_id'=>'710002954',
                'status'=>'active',
            ],
            [
                'name'=>'test',
                'email'=>'test@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'phone'=>'01831763868',
                'student_id'=>'710002955',
                'status'=>'inactive',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

    }
}
