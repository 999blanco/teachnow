<?php

namespace App\Livewire\General;

use App\Models\Region;
use App\Models\Subject;
use Livewire\Component;

class Teachers extends Component
{
    // Variables de materia y region del usuario
    public $subject;
    public $user_region;
    
    // Variables de busqueda y filtros
    public $search, $filter_by = 1, $order_by = 1;

    /**
     * Actualizar la materia y region del usuario
     */
    public function mount(Subject $subject, Region $region){
        $this->subject = $subject;
        $this->user_region = $region;
    }

    /**
     * Renderizar vista
     */
    public function render()
    {  
        // Query para obtener los profesores
        $query = $this->subject->teachers()
            ->where('region_id', $this->user_region->id);
        
        // Si se realiza una busqueda
        if ($this->search){
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        
        // Si se filtra por calificacion
        if ($this->filter_by == 1){
            $query->whereHas('reviews', function ($query) {
                $query->havingRaw('AVG(rating) >= 3.0');
            });
        }
        
        // Si se ordena por nombre
        if ($this->order_by == 1){
            $query->orderBy('name', 'asc');
        }
        
        $teachers = $query->paginate(12);
        
        return view('livewire.general.teachers', compact('teachers'));
    }
}
