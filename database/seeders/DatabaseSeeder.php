<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'admin',
            'email' => 'admin@email.com'
        ]);

        $companies = User::factory(3)->withCompany()->create(['role' => 'company']);

        $companies->each(function ($user) {
            $company = $user->company;
            Company::factory()->withJobs(5)->create(['user_id' => $user->id]);
        });

        $candidates = User::factory(10)->create(['role' => 'candidate']);

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
    }
}
