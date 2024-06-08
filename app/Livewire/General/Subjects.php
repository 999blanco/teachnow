<?php

namespace App\Livewire\General;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class Subjects extends Component
{
    use WithPagination;
    // Bootrap pagination
    protected $paginationTheme = 'bootstrap';

    // Variables de busqueda y region del usuario
    public $search;
    public $user_region;

    /**
     * Actualizar la region del usuario
     */
    public function mount(){
        $this->user_region = session('user_region');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        // Obtener todas las materias
        $subjects = Subject::paginate(12);

        // Si hay una busqueda
        if ($this->search){
            $subjects = Subject::where('name', 'like', '%' . $this->search . '%')->paginate(12);
        }
        
        return view('livewire.general.subjects', compact('subjects'));
    }
}
