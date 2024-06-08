<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileBanner extends Component
{
    use WithFileUploads;

    // Variable para almacenar el banner
    public $banner;

    /**
     * Obtener el banner del profesor existente
     */
    public function mount(User $teacher){
        $this->banner = $teacher->banner;
    }

    /**
     * Validar y guardar el banner del profesor
     */
    public function updatedBanner(){
        $this->validate([
            'banner' => ['required', 'image', 'max:5120']
        ]);

        $teacher = User::find(auth()->id());

        // Eliminar el banner anterior si no es el banner por defecto
        if ($teacher->banner != 'default-banner.png'){
            Storage::delete('public/banners/' . $teacher->banner);
        }

        // Guardar el nuevo banner
        $imgName = Carbon::now()->timestamp . "." . $this->banner->getClientOriginalExtension();
        $this->banner->storeAs('public/banners/', $imgName);

        $teacher->update([
            'banner' => $imgName
        ]);

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Restablecer el banner del profesor
     */
    public function resetBanner(){
        $teacher = User::find(auth()->id());

        // Eliminar el banner anterior si no es el banner por defecto
        if ($teacher->banner != 'default-banner.png'){
            Storage::delete('public/banners/' . $teacher->banner);
        }

        $teacher->update([
            'banner' => 'default-banner.png'
        ]);

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.modal.profile-banner');
    }
}
