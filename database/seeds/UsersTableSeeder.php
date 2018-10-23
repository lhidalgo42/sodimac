<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            User::create([
                'name' => 'Test User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make(123456),
                'role_id' => 1
            ]);
        }
    }
}
