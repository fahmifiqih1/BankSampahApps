<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_rek' => '2334567',
            'name' => 'fahmi fiqih',
            'email' => 'fahmi@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'no_rek' => '2345678',
            'name' => 'Ismoyo',
            'email' => 'ismoyo@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'no_rek' => '2356789',
            'name' => 'dani Wijayanto',
            'email' => 'dani@mail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}
