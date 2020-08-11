<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // $users = [
        //     [
        //         "name" => "Tuhairwe Edwin",
        //         "email" => "tuhairweedwin@yahoo.com",
        //         "image" => "default.jpg",
        //         "password" => "password",
        //         "userType" => "chairman",
        //         "status" => "Activated"
        //     ],
        //     [
        //         "name" => "Tweterane Isaac",
        //         "email" => "tweteranesc6@gmail.com",
        //         "image" => "default.jpg",
        //         "password" => "password",
        //         "userType" => "treasurer",
        //         "status" => "Activated"
        //     ]
        // ];

        User::create(
            [
                "name" => "Tuhairwe Edwin",
                "email" => "tuhairweedwin@yahoo.com",
                "image" => "default.jpg",
                "password" => Hash::make("password"),
                "userType" => "chairman",
                "status" => "Activated"
            ],
            [
                "name" => "Tweterane Isaac",
                "email" => "tweteranesc6@gmail.com",
                "image" => "default.jpg",
                "password" => Hash::make("password"),
                "userType" => "treasurer",
                "status" => "Activated"
            ]
        );
    }
}
