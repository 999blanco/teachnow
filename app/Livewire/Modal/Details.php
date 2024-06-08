<?php

namespace App\Livewire\Modal;

use App\Models\Region;
use App\Models\User;
use Livewire\Component;

class Details extends Component
{
    // Variable para almacenar la información del profesor
    public $teacher;
    public $name, $title, $city, $region, $social;

    /**
     * Obtener la información del profesor existente
     */
    public function mount(User $teacher)
    {
        $this->teacher = $teacher;
        $this->name = $teacher->name;
        $this->title = $teacher->title;
        $this->city = $teacher->city;
        $this->region = $teacher->region;
        $this->social = json_decode($teacher->social, true);
    }

    /**
     * Validar y guardar la información del profesor
     */
    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'city' => 'required',
            'region' => 'required',
        ]);

        
        $this->teacher->update([
            'name' => $this->name,
            'title' => $this->title,
            'city' => $this->city,
            'region_id' => $this->region->id,
            'social' => json_encode($this->social),
        ]);

        return redirect()->route('teacher', $this->teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Establecer la región del profesor
     */
    public function setRegion($region_id)
    {
        $this->region = Region::findOrFail($region_id);
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        $regions = Region::all();
        return view('livewire.modal.details', compact('regions'));
    }
}
