<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Livewire\Component;

class Contact extends Component
{
    // Variables para almacenar la información de contacto del profesor
    public $phone, $email, $price_per_hour;

    /**
     * Obtener la información de contacto del profesor existente
     */
    public function mount(User $teacher){
        $this->phone = $teacher->phone;
        $this->email = $teacher->email;
        $this->price_per_hour = $teacher->price_per_hour;
    }

    /**
     * Validar y guardar la información de contacto del profesor
     */
    public function save(){
        $this->validate([
            'phone' => 'nullable',
            'email' => 'required|email',
            'price_per_hour' => 'required|numeric'
        ]);

        $teacher = User::find(auth()->id());
        $teacher->phone = $this->phone;
        $teacher->email = $this->email;
        $teacher->price_per_hour = $this->price_per_hour;
        $teacher->save();

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.modal.contact');
    }
}
