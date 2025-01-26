<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator',
                'is_default' => false,
            ],
            [
                'name' => 'Company',
                'slug' => 'company',
                'description' => 'Company',
                'is_default' => false,
            ],
            [
                'name' => 'Candidate',
                'slug' => 'candidate',
                'description' => 'Candidate',
                'is_default' => true,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
