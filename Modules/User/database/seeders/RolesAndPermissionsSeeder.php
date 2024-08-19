<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define Permissions
        $permissions = [
            'view patients',
            'manage appointments',
            'write prescriptions',
            'access medical records',
            'administer medication',
            'perform surgeries',
            'access surgical records',
            'view lab requests',
            'manage lab tests',
            'access lab results',
            'manage users',
            'assign roles',
            'assign permissions',
            'manage system settings',
            'manage inventory',
            'dispense medication',
            'view prescriptions',
        
        ];

        // Create Permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define Roles and their Permissions
        $roles = [
            'doctor' => [
                'view patients',
                'manage appointments',
                'write prescriptions',
                'access medical records'
            ],
            'nurse' => [
                'view patients',
                'manage appointments',
                'administer medication'
            ],
            'surgeon' => [
                'view patients',
                'manage appointments',
                'perform surgeries',
                'access surgical records'
            ],
            'lab_technician' => [
                'view lab requests',
                'manage lab tests',
                'access lab results'
            ],
            'administrator' => [
                'manage users',
                'assign roles',
                'assign permissions',
                'manage system settings'
            ],
            'pharmacist' => [
                'view prescriptions',
                'manage inventory',
                'dispense medication'
            ],
        ];

        // Create Roles and Assign Permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
