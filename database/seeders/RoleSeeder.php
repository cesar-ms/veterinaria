<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Ayudante']);

        //No users
        Permission::create([
            'name'        => 'admin.home',
            'description' => 'Ver administración'
        ])->syncRoles([$role1, $role2]);

        //Users

        Permission::create([
            'name'        => 'admin.users.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.users.edit',
            'description' => 'Editar usuario'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.users.create',
            'description' => 'Crear un usuario'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.users.destroy',
            'description' => 'Eliminar usuario'
        ])->syncRoles([$role1]);

        //Roles

        Permission::create([
            'name'        => 'admin.roles.index',
            'description' => 'Ver listado de los roles'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.roles.edit',
            'description' => 'Editar un rol'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.roles.create',
            'description' => 'Crear un rol'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.roles.update',
            'description' => 'Actualizar un rol'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.roles.destroy',
            'description' => 'Eliminar un rol'
        ])->syncRoles([$role1]);

        //Ventas
        Permission::create([
            'name'        => 'admin.ventas.index',
            'description' => 'Ver listado de ventas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.ventas.create',
            'description' => 'Hacer ventas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.ventas.edit',
            'description' => 'Editar venta'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.ventas.destroy',
            'description' => 'Eliminar venta'
        ])->syncRoles([$role1]);

        /* ARTICULOS */

        Permission::create([
            'name'        => 'admin.articles.index',
            'description' => 'Ver listado de artículos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.articles.create',
            'description' => 'Crear nuevo artículo'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.articles.edit',
            'description' => 'Editar artículo'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.articles.destroy',
            'description' => 'Eliminar artículo'
        ])->syncRoles([$role1]);

        /*Citas*/

        Permission::create([
            'name'        => 'admin.appointments.index',
            'description' => 'Ver listado de citas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.appointments.create',
            'description' => 'Crear nueva cita'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.appointments.edit',
            'description' => 'Editar cita'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.appointments.destroy',
            'description' => 'Eliminar cita'
        ])->syncRoles([$role1]);

        /*Pacientes*/

        Permission::create([
            'name'        => 'admin.patients.index',
            'description' => 'Ver listado de pacientes'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.patients.create',
            'description' => 'Registrar nuevo paciente'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.patients.edit',
            'description' => 'Editar paciente registrado'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.patients.destroy',
            'description' => 'Eliminar paciente registrado'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.patients.receta',
            'description' => 'Expedir receta médica'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.patients.show',
            'description' => 'Ver historial médico'
        ])->syncRoles([$role1]);

        /*Citas*/

        Permission::create([
            'name'        => 'admin.services.index',
            'description' => 'Ver listado de servicios'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.services.create',
            'description' => 'Crear nuevo servicio'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.services.edit',
            'description' => 'Editar servicio'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.services.destroy',
            'description' => 'Eliminar servicio'
        ])->syncRoles([$role1]);

        /*Proveedores*/

        Permission::create([
            'name'        => 'admin.suppliers.index',
            'description' => 'Ver listado de proveedores'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.suppliers.create',
            'description' => 'Crear nuevo proveedor'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'admin.suppliers.edit',
            'description' => 'Editar proveedor'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.suppliers.show',
            'description' => 'Ver detalles de proveedor'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.suppliers.destroy',
            'description' => 'Eliminar proveedor'
        ])->syncRoles([$role1]);

        /*ESTADISTICAS*/
        Permission::create([
            'name'        => 'admin.services.statistics',
            'description' => 'Ver estadísticas de servicios'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'admin.ventas.statistics',
            'description' => 'Ver estadísticas de ventas'
        ])->syncRoles([$role1]);
    }
}
