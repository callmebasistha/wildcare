<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dev Admin',
            'email' => 'devadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'asdfgh137'
        ]);
    }
}
