<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Antoni Buyer",
            'email' => "antonibuyer@gmail.com",
            'phone' => "08125260125",
            'role' => "buyer",
            'password' => Hash::make("12345678")
        ]);

        DB::table('users')->insert([
            'name' => "Antoni Farmer",
            'email' => "antonifarmer@gmail.com",
            'phone' => "08125270125",
            'role' => "farmer",
            'password' => Hash::make("12345678")
        ]);

        DB::table('users')->insert([
            'name' => "Antoni Transporter",
            'email' => "antonitransporter@gmail.com",
            'phone' => "08125260126",
            'role' => "transporter",
            'password' => Hash::make("12345678")
        ]);

        DB::table('users')->insert([
            'name' => "Antoni Admin",
            'email' => "antoniadmin@gmail.com",
            'phone' => "08125260127",
            'role' => "admin",
            'password' => Hash::make("12345678")
        ]);
    }
}
