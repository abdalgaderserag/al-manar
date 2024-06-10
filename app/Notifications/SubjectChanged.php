<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubjectChanged extends Notification
{
    use Queueable;

    private $text;
    private $type;
    /**
     * Create a new notification instance.
     */
    public function __construct($text, $type)
    {
        $this->text = $text;
        $this->type = $type;
        if ($type == 1)
            $this->classCanceled();
        if ($type == 2)
            $this->classChanged();
    }


    private function classCanceled(){
    }

    private function classChanged(){
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'text' => $this->text
        ];
    }
}
