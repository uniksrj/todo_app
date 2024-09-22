<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Todolist;

class Notification_msg extends Notification
{
    use Queueable;
    protected $task;

    public function __construct(Todolist $task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];  // You can add more channels like 'database', 'sms', etc.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task Completed')
            ->line('Your task "' . $this->task->title . '" has been completed.')
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Thank you for using our application!');
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
