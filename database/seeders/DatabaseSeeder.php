<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        Tag::factory(10)->create();

        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'admin',
            'email' => 'admin@email.com',
        ]);

        $companies = User::factory(3)->withCompany()->create(['role' => 'company']);

        $companies->each(function ($user) {

            $jobs = Job::factory(5)->create(['company_id' => $user->company->id]);

            // Assign tags to jobs
            $tags = Tag::all(); // Fetch all tags created by TagSeeder
            $jobs->each(function ($job) use ($tags) {
                $job->tag()->attach(
                    $tags->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
        });

        $candidates = User::factory(10)->create(['role' => 'candidate']);

        $candidates->each(function ($user, $index) {
            if ($index < 7) {
                // Most candidates under free plan
                $subscription = Subscription::factory()->create([
                    'user_id' => $user->id,
                    'plan' => 'free',
                    'category' => 'basic',
                    'price' => 0,
                ]);
            } else {
                // 2 to 3 candidates under silver tier
                $payment = Payment::factory()->create([
                    'user_id' => $user->id,
                    'status' => $index % 2 == 0 ? 'pending' : 'paid',
                ]);

                $subscription = Subscription::factory()->create([
                    'user_id' => $user->id,
                    'plan' => 'silver',
                    'category' => 'premium',
                    'payment_id' => $payment->id,
                ]);
            }
        });

        $this->call([
            TagSeeder::class,
        ]);
    }
}
