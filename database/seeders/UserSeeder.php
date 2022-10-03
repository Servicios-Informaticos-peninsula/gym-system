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
            'name' => 'TI',
            'surnames'=>'Soporte',
            'username'=>'TI.Soporte',
            'code_user' => '0001',
            'email' => 'it@domain.com',
            'phone' => '9999708319',

            'password' => Hash::make('123456'),
        ])->assignRole(1);

        User::create([
            'name' => 'Administrador',
            'surnames'=>'administrador',
            'username'=>'Administrador.administrador',
            'code_user' => '0002',
            'email' => 'administrador@domain.com',
            'phone' => '0000000000',

            'password' => Hash::make('123456'),
        ])->assignRole(2);
        User::create([
            'name' => 'Rodrigo Diaz',
            'surnames'=>'Diaz Serviran',
            'username'=>'Rodrigo.Diaz',
            'code_user' => '0003',
            'email' => 'rodrigo_diaz@domain.com',
            'phone' => '9992389045',

            'password' => Hash::make('123456'),
        ])->assignRole(5);
    }
}
