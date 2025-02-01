<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $anggotaRole = Role::create(['name' => 'anggota']);

        $admin = User::create([
            'name' => 'AdminNununker',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole($adminRole);

        $anggota = User::create([
            'name' => 'AnggotaNununker',
            'email' => 'anggota@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $anggota->assignRole($anggotaRole);
    }
}
