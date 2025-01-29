<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class JobCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $job;
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Job Posted in Your Subscribed Category')
            ->greeting("Hello {$notifiable->name},")
            ->line("A new job '{$this->job->title}' has been posted in your subscribed category.")
            ->action('View Job', url("/job-details/{$this->job->id}"))
            ->line('Thank you for using our job portal!')
            ->action('Unsubscribe', url("/unsubscribe/{$notifiable->id}"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
