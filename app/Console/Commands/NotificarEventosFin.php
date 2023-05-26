<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Models\Evento;
use App\Notifications\EventoNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarEventosFin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificar:eventos-proximos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía notificaciones para eventos que están próximos a finalizar';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eventos = Evento::with('categoria.usuarios')
            ->whereDate('fecha_fin', '>', now())
            ->whereDate('fecha_fin', '<=', now()->addDays(100))
            ->get();

        foreach ($eventos as $evento) {
            $usuarios = $evento->categoria->usuarios;
            Notification::send($usuarios, new EventoNotification($evento));
        }

        $this->info('Notificaciones enviadas para eventos próximos a finalizar.');
    }

    
}
