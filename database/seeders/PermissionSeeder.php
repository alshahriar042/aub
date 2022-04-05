<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ********* dashboard permission ************ */
        $moduleDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleDashboard->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'dashboard'
        ]);

        /* ********* role permission ************ */
        $moduleRole = Module::updateOrCreate(['name' => 'Role Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Access Role',
            'slug'      => 'roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Create Role',
            'slug'      => 'roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Edit Role',
            'slug'      => 'roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Delete Role',
            'slug'      => 'roles.destroy'
        ]);

        /* ********* user permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'User Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access User',
            'slug'      => 'users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create User',
            'slug'      => 'users.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit User',
            'slug'      => 'users.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete User',
            'slug'      => 'users.destroy'
        ]);






    }
}
