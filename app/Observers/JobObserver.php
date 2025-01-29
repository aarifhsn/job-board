<?php

namespace App\Observers;

use App\Models\Job;
use App\Notifications\JobCreatedNotification;
use App\Models\Subscription;

class JobObserver
{
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        // Get all users subscribed to this job category
        $subscribers = Subscription::where('category_id', $job->category_id)
            ->with('user')
            ->get();

        // Notify each subscriber
        foreach ($subscribers as $subscription) {
            if ($subscription->user) {
                $subscription->user->notify(new JobCreatedNotification($job));
            }
        }
    }

    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "deleted" event.
     */
    public function deleted(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "restored" event.
     */
    public function restored(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "force deleted" event.
     */
    public function forceDeleted(Job $job): void
    {
        //
    }
}
