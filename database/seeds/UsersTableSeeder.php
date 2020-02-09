<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'PixelCut',
            'email' => 'admin@digitalwaves.net',
            'is_admin' => User::Admin,
            'status' => '1',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'first_name' => 'Client',
            'last_name' => ' PixelCut',
            'email' => 'client@digitalwaves.net',
            'is_admin' => User::Client,
            'status' => '1',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'first_name' => 'Writer',
            'last_name' => 'PixelCut',
            'email' => 'writer@digitalwaves.net',
            'is_admin' => User::Writter,
            'status' => '1',
            'password' => bcrypt('password'),
        ]);
    }
}
