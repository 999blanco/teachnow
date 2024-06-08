<?php

namespace App\Livewire\General;

use App\Notifications\UserContacted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Contact extends Component
{   
    // Variables del formulario
    public $name, $email, $message;

    /**
     * Validar formulario y enviar email
     */
    public function save(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Información del formulario
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ];
        try {
            // Enviamos el email
            Notification::route('mail', [
                'ayuda@teachnow.es' => 'Teachnow',
            ])->notify(new UserContacted($data));

            return redirect(route('help'))->with('success', 'Mensaje enviado con éxito, le responderemos lo antes posible.');
        } catch (\Throwable $th) {
            Log::error('Error al enviar el email de contacto: ' . $th->getMessage());
            return redirect(route('help'))->with('error', 'Error al enviar el mensaje, inténtelo más tarde.');
        }
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.general.contact');
    }
}
