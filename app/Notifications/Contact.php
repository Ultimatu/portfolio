<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Contact extends Notification
{
    use Queueable;

    public string $name;
    public string $email;

    public string $subject;

    public string $message;


    /**
     * Create a new notification instance.
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->subject = $data['subject'];
        $this->message = $data['message'];
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
                    ->greeting('Bonjour !')
                    ->line('Chef,')
                    ->subject('Message Portfolio Tonde')
                    ->line('Vous avez reçu un nouveau message de ' . $this->name . ' (' . $this->email . ')')
                    ->line('Sujet: ' . $this->subject)
                    ->line('Message: ' . $this->message)
                    ->success()
                    ->action('Voir le message', route('filament.admin.resources.contacts.index'))
                    ->line('Portez-vous bien !')
                    ->priority(1)->salutation('Cordialement, Tonde');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }
}
