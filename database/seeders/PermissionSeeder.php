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

        /* ********* department permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Department Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Department',
            'slug'      => 'departments.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Department',
            'slug'      => 'departments.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Department',
            'slug'      => 'departments.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Department',
            'slug'      => 'departments.destroy'
        ]);

        /* ********* batchs permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Batch Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Batch',
            'slug'      => 'batchs.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Batch',
            'slug'      => 'batchs.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Batch',
            'slug'      => 'batchs.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Batch',
            'slug'      => 'batchs.destroy'
        ]);

        /* ********* courses permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Course Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Course',
            'slug'      => 'courses.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Course',
            'slug'      => 'courses.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Course',
            'slug'      => 'courses.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Course',
            'slug'      => 'courses.destroy'
        ]);




    }
}
