<?php

namespace App\Notifications;

use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventoNotification extends Notification
{
    use Queueable;

    protected $evento;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $fechaFinalizacion = Carbon::createFromFormat('Y-m-d', $this->evento->fecha_fin);
        $diasRestantes = $fechaFinalizacion->diffInDays(Carbon::now());
        
        return [
            'id' => $this->evento->id,
            'texto' => "Este evento '" . $this->evento->texto . "' está a punto de finalizar",
            'time' => $diasRestantes . ' días restantes',
        ];
    }

    public function shouldBroadcast($notifiable)
    {
        $fechaFinalizacion = Carbon::createFromFormat('Y-m-d', $this->evento->fecha_fin);
        $diasRestantes = $fechaFinalizacion->diffInDays(Carbon::now());

        return $diasRestantes <= 100;
    }
}
