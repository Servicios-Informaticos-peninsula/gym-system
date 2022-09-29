<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador Maestro']);

        Role::create(['name' => 'Admininistrador']);

        Role::create(['name' => 'Entrenador']);

        Role::create(['name' => 'Empleado']);

        Role::create(['name' => 'Cliente']);


    }
}
