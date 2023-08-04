<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMissionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;
    public $user_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($data, $user_id)
    {
        $this->data = $data;
        $this->user_id = $user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $data): array
    {
        return [
            'user_id' => $this->user_id,
            'data' => $this->data,
            'is_read' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

        /**
     * Get the database representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    // public function toDatabase($notifiable)
    // {
    //     // Add logic to store the notification in the database
    //     return [
    //         'data' => $this->data,
    //         'is_read' => false,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ];
    // }
}
