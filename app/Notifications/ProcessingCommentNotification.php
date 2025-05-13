<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProcessingCommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     public $message;
     public $coursetitle;
     public $username;
    public function __construct($message,$coursetitle,$username)
    {
        $this->message= $message;
        $this->coursetitle = $coursetitle;
        $this->username = $username;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Hi'.$this->username)
            ->line('This Comment has been added to'.$this->coursetitle)
            ->line('"'.$this->message.'"')
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
