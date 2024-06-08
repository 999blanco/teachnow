<?php

namespace App\Livewire\Regions;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegionList extends Component
{   
    use WithFileUploads;

    // Varaible para buscar una provincia
    public $search_by;

    // Variables para el edit y la creacion de una provincia
    public $region_id, $region_name, $region_flag, $region_new_flag;

    // Obtener la información de la provincia existente
    public function edit($id)
    {
        $region = Region::find($id);
        $this->region_id = $region->id;
        $this->region_name = $region->name;
        $this->region_flag = $region->flag;
    }

    // Validar y guardar la información de la provincia
    public function update()
    {
        $this->validate([
            'region_name' => 'required',
            'region_new_flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $region = Region::find($this->region_id);
        $flagName = $region->flag;

        // Guardar la nueva imagen de la provincia
        if ($this->region_new_flag) {
            // Eliminar la imagen anterior
            if ($flagName) {
                unlink(storage_path('app/public/regions/' . $flagName));
            }
            $flagName = time() . '.' . $this->region_new_flag->extension();
            $this->region_new_flag->storeAs('public/regions', $flagName);
        }

        $region->update([
            'name' => $this->region_name,
            'flag' => $flagName,
        ]);

        return redirect()->route('admin.regions')->with('updated', 'Provincia modificada con éxito');
    }
    
    // Remover la region existente
    public function delete($id)
    {
        $region = Region::find($id);
        $imageName = $region->image;

        // Eliminar la imagen de la provincia
        if ($imageName) {
            unlink(storage_path('app/public/regions/' . $imageName));
        }

        $region->delete();

        session()->flash('deleted', 'Provincia eliminada con éxito');
    }


    /**
     * Renderizar vista
     */
    public function render()
    {
        $regions = Region::all();

        if ($this->search_by) {
            // Buscamos por nombre de materia
            $regions = Region::query()
                ->where('name', 'like', '%' . $this->search_by . '%')
                ->get();
        }

        return view('livewire.regions.region-list', compact('regions'));
    }
}
