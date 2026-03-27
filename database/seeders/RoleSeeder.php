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
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'instructor']);
        $role3 = Role::create(['name' => 'aprendiz']);

        Permission::create(['name' => 'admin.home'])->syncRoles($role1);
        Permission::create(['name' => 'instructor.home'])->syncRoles($role2);
        Permission::create(['name' => 'aprendiz.home'])->syncRoles($role3);
    }
}
