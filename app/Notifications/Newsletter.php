<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Newsletter extends Notification
{
    use Queueable;

    public string $email;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $email)
    {
        $this->email = $email;
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
                    ->greeting('Salut !')
                    ->line('Vous avez été inscrit au newsletter de Tonde.')
                    ->line('Vous récevrez des notifications sur les différentes mises à jour de notre site.')
                    ->action('Se désabonner', route('newsletter.unsubscribe', ['email' => $this->email]))
                    ->line('Merci de votre confiance !')
                    ->salutation('Cordialement, Tonde');
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
