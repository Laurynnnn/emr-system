<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define Permissions by Category
        $permissionsByCategory = [
            'Patient Management' => [
                'view patients',
                'create patients',
                'update patients',
                'delete patients',
                'reactivate patients',
            ],
            'Medical Records' => [
                'view medical records',
                'create medical records',
                'update medical records',
                'delete medical records',
                'reactivate medical records',
            ],
            'Lab Management' => [
                'view lab tests',
                'create lab tests',
                'update lab tests',
                'delete lab tests',
                'authenticate lab results',
            ],
            'Prescription Management' => [
                'view prescriptions',
                'create prescriptions',
                'update prescriptions',
                'delete prescriptions',
                'review prescriptions',
            ],
            'Appointment Management' => [
                'view appointments',
                'create appointments',
                'update appointments',
                'delete appointments',
            ],
            'User Management' => [
                'manage users',
                'assign roles',
                'assign permissions',
            ],
            'System Settings' => [
                'manage system settings',
            ],
        ];

        DB::transaction(function() use ($permissionsByCategory) {
            // Create Permissions and associate them with Categories
            foreach ($permissionsByCategory as $categoryName => $permissions) {
                $categoryId = DB::table('permission_categories')->where('name', $categoryName)->value('id');

                foreach ($permissions as $permission) {
                    Permission::firstOrCreate([
                        'name' => $permission,
                        'category_id' => $categoryId,
                    ]);
                }
            }
        });

        // Define Roles and their Permissions
        $roles = [
            'Admin' => [
                'manage users',
                'assign roles',
                'assign permissions',
                'manage system settings',
            ],
        ];

        // Create Roles and Assign Permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
