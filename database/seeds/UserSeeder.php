<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'Administrador']);
        //Se crear el usuario administrador y se asigna el rol administrador
        $user = \App\User::create([
                    'name' => 'administrador',
                    'email' => 'administrador@unal.edu.co',
                    'cedula' => 102931,
                    'cargo' => 'Administrador',
                    'password' => Hash::make(123),
                ]);

        $user->assignRole('Administrador');

        $role = Role::create(['name' => 'Encargado Logistica']);
        $user= \App\User::create([
            'name' => 'Encargado Logistica',
            'email' => 'Encargado_Logistica@unal.edu.co',
            'cedula' => 1,
            'cargo' => 'Encargado Logistica',
            'password' => Hash::make(123),
        ]);

        $user->assignRole('Encargado Logistica');

        $role = Role::create(['name' => 'Tesorero']);
        $user = \App\User::create([
            'name' => 'Tesorero',
            'email' => 'tesorero@unal.edu.co',
            'cedula' => 2,
            'cargo' => 'Tesorero',
            'password' => Hash::make(123),
        ]);
        $user->assignRole('Tesorero');

        $role = Role::create(['name' => 'Contador']);
        $user = \App\User::create([
            'name' => 'Contador',
            'email' => 'contador@unal.edu.co',
            'cedula' => 3,
            'cargo' => 'Contador',
            'password' => Hash::make(123),
        ]);
        $user->assignRole('Contador');

    }
}
