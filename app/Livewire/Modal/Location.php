<?php

namespace App\Livewire\Modal;

use App\Models\Region;
use Livewire\Component;

class Location extends Component
{
    // Variable para almacenar la región del usuario
    public $user_region;

    /**
     * Obtener la región del usuario de la sesión
     */
    public function mount()
    {
        $this->user_region = session('user_region');
    }

    /**
     * Establecer la región del usuario
     */
    public function setRegion($region_id)
    {
        $this->user_region = Region::findOrFail($region_id);
    }

    /**
     * Actualizar la región del usuario
     */
    public function update()
    {
        session(['user_region' => $this->user_region]);
        return redirect(route('subjects'))->with('success', '¡Localización actualizada correctamente!');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        $regions = Region::all();
        return view('livewire.modal.location', compact('regions'));
    }
}
