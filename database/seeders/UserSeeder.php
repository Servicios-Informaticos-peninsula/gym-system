<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Super-Admin */
        User::create([
            'name' => 'Pedro Sánchez Cárdenas',
            'code_user' => '0001',
            'email' => 'it@domain.com',
            'phone' => '9999708319',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'name' => 'Administrador',
            'code_user' => '0002',
            'email' => 'administrador@domain.com',
            'phone' => '0000000000',
            'password' => Hash::make('123456'),
        ]);
    }
}
