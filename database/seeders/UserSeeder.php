<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'nama' => 'Admin',
            'email' => 'adminbejo@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '123456789',
            'level' => 'admin'
        ]);

        User::create([
            'nama' => 'ryan',
            'email' => 'ryan@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '123456789',
        ]);
    }
}
