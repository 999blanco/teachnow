<?php

namespace App\Livewire\Regions;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddRegion extends Component
{
    use WithFileUploads;
    // Variables para almacenar los datos del formulario
    public $name, $flag;

    /**
     * Validar y guardar la información de la provincia
     */
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'flag' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $flagName = time() . '.' . $this->flag->extension();
        $this->flag->storeAs('public/regions', $flagName);

        Region::create([
            'name' => $this->name,
            'flag' => $flagName,
        ]);

        return redirect()->route('admin.regions')->with('created', 'Provincia creada con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.regions.add-region');
    }
}
