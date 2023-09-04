<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'name' => 'Demo',
            'apellidoP' => 'DemoAp',
            'apellidoM'=> 'DemoAm',
            'cedula'=> '91980353',
            'fecha_contratacion' => '2022-01-01',
            'email' => 'demo@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
    }
}
