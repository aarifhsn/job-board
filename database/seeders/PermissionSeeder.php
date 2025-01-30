<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name" => "Create Role",
                "slug" => "create-role",
                "description" => "Create Role",
            ],
            [
                "name" => "Read Role",
                "slug" => "read-role",
                "description" => "Read Role",
            ],
            [
                "name" => "Update Role",
                "slug" => "update-role",
                "description" => "Update Role",
            ],
            [
                "name" => "Delete Role",
                "slug" => "delete-role",
                "description" => "Delete Role",
            ],
            [
                "name" => "Create Permission",
                "slug" => "create-permission",
                "description" => "Create Permission",
            ],
            [
                "name" => "Read Permission",
                "slug" => "read-permission",
                "description" => "Read Permission",
            ],
            [
                "name" => "Update Permission",
                "slug" => "update-permission",
                "description" => "Update Permission",
            ],
            [
                "name" => "Delete Permission",
                "slug" => "delete-permission",
                "description" => "Delete Permission",
            ],
            // User
            [
                "name" => "Create User",
                "slug" => "create-user",
                "description" => "Create User",
            ],
            [
                "name" => "Read User",
                "slug" => "read-user",
                "description" => "Read User",
            ],
            [
                "name" => "Update User",
                "slug" => "update-user",
                "description" => "Update User",
            ],
            [
                "name" => "Delete User",
                "slug" => "delete-user",
                "description" => "Delete User",
            ],
            // Company
            [
                "name" => "Create Company",
                "slug" => "create-company",
                "description" => "Create Company",
            ],
            [
                "name" => "Read Company",
                "slug" => "read-company",
                "description" => "Read Company",
            ],
            [
                "name" => "Update Company",
                "slug" => "update-company",
                "description" => "Update Company",
            ],
            [
                "name" => "Delete Company",
                "slug" => "delete-company",
                "description" => "Delete Company",
            ],
            // Jobs
            [
                "name" => "Create Job",
                "slug" => "create-job",
                "description" => "Create Job",
            ],
            [
                "name" => "Read Job",
                "slug" => "read-job",
                "description" => "Read Job",
            ],
            [
                "name" => "Update Job",
                "slug" => "update-job",
                "description" => "Update Job",
            ],
            [
                "name" => "Delete Job",
                "slug" => "delete-job",
                "description" => "Delete Job",
            ],
            // Payment
            [
                "name" => "Create Payment",
                "slug" => "create-payment",
                "description" => "Create Payment",
            ],
            [
                "name" => "Read Payment",
                "slug" => "read-payment",
                "description" => "Read Payment",
            ],
            [
                "name" => "Update Payment",
                "slug" => "update-payment",
                "description" => "Update Payment",
            ],
            [
                "name" => "Delete Payment",
                "slug" => "delete-payment",
                "description" => "Delete Payment",
            ],
            // Subscription
            [
                "name" => "Create Subscription",
                "slug" => "create-subscription",
                "description" => "Create Subscription",
            ],
            [
                "name" => "Read Subscription",
                "slug" => "read-subscription",
                "description" => "Read Subscription",
            ],
            [
                "name" => "Update Subscription",
                "slug" => "update-subscription",
                "description" => "Update Subscription",
            ],
            [
                "name" => "Delete Subscription",
                "slug" => "delete-subscription",
                "description" => "Delete Subscription",
            ],
            // Tag
            [
                "name" => "Create Tag",
                "slug" => "create-tag",
                "description" => "Create Tag",
            ],
            [
                "name" => "Read Tag",
                "slug" => "read-tag",
                "description" => "Read Tag",
            ],
            [
                "name" => "Update Tag",
                "slug" => "update-tag",
                "description" => "Update Tag",
            ],
            [
                "name" => "Delete Tag",
                "slug" => "delete-tag",
                "description" => "Delete Tag",
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
