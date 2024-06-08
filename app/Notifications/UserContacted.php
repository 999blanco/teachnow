<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserContacted extends Notification
{
    use Queueable;
    public $data;


    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
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
                    ->subject('Mensaje de ayuda desde la web de Teachnow')
                    ->line('El siguiente usuario de la plataforma ha contactado con nosotros.')
                    ->line('Nombre: ' . $this->data['name'])
                    ->line('Email: ' . $this->data['email'])
                    ->line('Mensaje: ' . $this->data['message'])
                    ->line('Por favor, responde a este mensaje lo antes posible.');
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
