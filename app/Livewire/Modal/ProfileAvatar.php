<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileAvatar extends Component
{
    use WithFileUploads;

    // Variable para almacenar la imagen
    public $avatar;

    /**
     * Obtener la imagen del profesor existente
     */
    public function mount(User $teacher){
        $this->avatar = $teacher->avatar;
    }

    /**
     * Validar y guardar la imagen del profesor
     */
    public function updatedAvatar(){
        $this->validate([
            'avatar' => ['required', 'image', 'max:5120']
        ]);

        $teacher = User::find(auth()->id());

        // Eliminar la imagen anterior si no es la imagen por defecto
        if ($teacher->avatar != 'default-avatar.png'){
            Storage::delete('public/avatars/' . $teacher->avatar);
        }

        // Guardar la nueva imagen
        $imgName = Carbon::now()->timestamp . "." . $this->avatar->getClientOriginalExtension();
        $this->avatar->storeAs('public/avatars/', $imgName);

        $teacher->update([
            'avatar' => $imgName
        ]);

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Restablecer la imagen del profesor
     */
    public function resetAvatar(){
        $teacher = User::find(auth()->id());

        // Eliminar la imagen anterior si no es la imagen por defecto
        if ($teacher->avatar != 'default-avatar.png'){
            Storage::delete('public/avatars/' . $teacher->avatar);
        }

        $teacher->update([
            'avatar' => 'default-avatar.png'
        ]);

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.modal.profile-avatar');
    }
}
