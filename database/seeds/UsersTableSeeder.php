<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('123456'),
            'role_id' => 0
        ]);
    }
}
