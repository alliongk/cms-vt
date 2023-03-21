<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userseeder=[
            [
                'username'=>'superadmin',
                'name'=>'Admin',
                'email'=>'superadmin@gmail.com',
                'password'=>Hash::make('123123123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]
        ];

        // \App\User::create(
            
        // );
        DB::table('users')->insert($userseeder);
    }
}
