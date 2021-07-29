<?php

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
        DB::table('users')->insert([
            'user_id' => 1,
            'user_name' => 'Super Admin',
            'user_username' => 'superadmin',
            'password' => Hash::make('secret'),
            'role_id' => 1,
            'status_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
