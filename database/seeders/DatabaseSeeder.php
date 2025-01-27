<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\Payment;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        $this->call([
            UserRolePermissionSeeder::class,
        ]);

        $admin = User::factory()->withRole("admin")->create([
            'name' => 'admin',
            'email' => 'admin@email.com'
        ]);

        $companies = User::factory(3)->withCompany()->withRole("company")->create();

        $companies->each(function ($user) {
            $company = $user->company;
            Company::factory()->withJobs(5)->create(['user_id' => $user->id]);
        });

        $candidate = User::factory()->withRole("candidate")->create([
            'name' => 'candidate',
            'email' => 'candidate@email.com'
        ]);

        $subscription = Subscription::factory()->create([
            'user_id' => $candidate->id,
            'plan' => 'free',
            'category' => 'basic',
            'price' => 0
        ]);

        $candidates = User::factory(10)->withRole("candidate")->create();

        $candidates->each(function ($user, $index) {
            if ($index < 7) {
                // Most candidates under free plan
                $subscription = Subscription::factory()->create([
                    'user_id' => $user->id,
                    'plan' => 'free',
                    'category' => 'basic',
                    'price' => 0
                ]);
            } else {
                // 2 to 3 candidates under silver tier
                $payment = Payment::factory()->create([
                    'user_id' => $user->id,
                    'status' => $index % 2 == 0 ? 'pending' : 'paid'
                ]);

                $subscription = Subscription::factory()->create([
                    'user_id' => $user->id,
                    'plan' => 'silver',
                    'category' => 'premium',
                    'payment_id' => $payment->id
                ]);
            }
        });

        $this->call([
            TagSeeder::class,
        ]);
    }
}
