<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Livewire\Component;

class AboutMe extends Component
{
    // Varaible para almacenar la descripción del profesor
    public $about_me;

    /**
     * Obtener la información del profesor existente
     */
    public function mount(User $teacher){
        $this->about_me = $teacher->about_me;
    }

    /**
     * Validar y guardar la descripción del profesor
     */
    public function save(){
        $this->validate([
            'about_me' => 'required',
        ]);

        $teacher = User::find(auth()->id());
        $teacher->about_me = $this->about_me;
        $teacher->save();

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.modal.about-me');
    }
}
