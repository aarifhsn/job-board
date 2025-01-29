<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        $admin = Role::where('slug', 'admin')->first();
        $company = Role::where('slug', 'company')->first();
        $candidate = Role::where('slug', 'candidate')->first();

        $assign_admins = User::whereIn('id', [1, 2, 3, 4, 5])->get();
        foreach ($assign_admins as $user) {
            $user->roles()->attach($admin);
        }
        $assign_companies = User::whereIn('id', [6, 7, 8])->get();
        foreach ($assign_companies as $user) {
            $user->roles()->attach($company);
        }
        $assign_candidates = User::whereIn('id', [9, 10, 11, 12, 13, 14, 15, 16, 17, 18])->get();
        foreach ($assign_candidates as $user) {
            $user->roles()->attach($candidate);
        }

        $company_permissions = Permission::whereIn('slug', [
            'create-job',
            'update-job',
            'delete-job',
            'read-job',
            'create-tag',
            'update-tag',
            'delete-tag',
            'read-tag',
            'create-category',
            'update-category',
            'delete-category',
            'read-category',
        ])->get();

        $candidate_permissions = Permission::whereIn('slug', [
            'read-job',
            'read-tag',
            'read-category',
        ])->get();

        $admin_permissions = Permission::all()->pluck('id')->toArray();

        $admin->permissions()->attach($admin_permissions);
        $company->permissions()->attach($company_permissions);
        $candidate->permissions()->attach($candidate_permissions);
    }
}
