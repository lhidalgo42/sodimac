<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'User',
            'description' => 'A simple user'
        ]);
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrador del Sistema'
        ]);

    }
}
