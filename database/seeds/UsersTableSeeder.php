<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin1@test.com',
            'password' => Hash::make('Dummy123'),
        ]);
    }
}
