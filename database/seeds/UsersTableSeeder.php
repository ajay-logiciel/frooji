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
            'name' => 'Super Admin',
            'email' => 'dev@logicielsolutions.co.in',
            'password' => bcrypt('123456'),
        ]);
    }
}
