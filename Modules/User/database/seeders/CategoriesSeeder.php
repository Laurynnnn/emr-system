<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Patient Management',
            'Medical Records',
            'Lab Management',
            'Prescription Management',
            'Appointment Management',
            'User Management',
            'System Settings',
        ];

        foreach ($categories as $categoryName) {
            DB::table('permission_categories')->insert([
                'name' => $categoryName,
            ]);
        }
    }
}
