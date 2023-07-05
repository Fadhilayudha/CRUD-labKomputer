<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()   //php artisan db:seed --class=DatabaseSeeder 
    {
        User::create([
            'username' => 'Fadhil',
            'name' => 'Muhammad Fadhil Ayudha',
            'email' => 'fadhil@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
