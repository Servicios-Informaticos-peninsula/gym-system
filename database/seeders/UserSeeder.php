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
        /* Super-Admin  administrador maestro*/
        User::create([
            'name' => 'Rodrigo Enrique',
            'surnames'=>'Diaz Serviran',
            'username'=>'Rodrigo.Diaz',
            'code_user' => '0001',
            'email' => 'diaz-rodrigo@hotmail.com',
            'phone' => '+529999708319',

            'password' => Hash::make('123456'),
        ])->assignRole(1);
        User::create([
            'name' => 'Cosme Alberto',
            'surnames'=>'Magaña Camara',
            'username'=>'Cosme.Magaña',
            'code_user' => '0002',
            'email' => 'cosme.magaña@hotmail.com',
            'phone' => '+529992389045',

            'password' => Hash::make('123456'),
        ])->assignRole(1);
        User::create([
            'name' => 'Pedro Adrian',
            'surnames'=>'Sanchez Cardenas',
            'username'=>'Pedro.Sanchez',
            'code_user' => '0003',
            'email' => 'pedrosanchezcardenas@gmail.com',
            'phone' => '+529992389045',

            'password' => Hash::make('123456'),
        ])->assignRole(1);
            /**administrador  */
        User::create([
            'name' => 'David',
            'surnames'=>'May',
            'username'=>'David.May',
            'code_user' => '0004',
            'email' => 'administrador@domain.com',
            'phone' => '+529992389045',

            'password' => Hash::make('123456'),
        ])->assignRole(2);

    }
}
