<?php

namespace App\Livewire\Teachers;

use App\Models\User;
use Livewire\Component;

class TeacherList extends Component
{
    // Variables para buscar y ordenar las valoraciones
    public $search_by = null;
    public $order_by = 1;

    /**
     * Función para banear a un usuario
     */
    public function ban($id){
        $teacher = User::find($id);
        $teacher->update([
            'banned' => true,
        ]);
        session()->flash('banned', 'Usuario baneado con éxito');
    }

    /**
     * Función para desbanear a un usuario
     */
    public function unban($id){
        $teacher = User::find($id);
        $teacher->update([
            'banned' => false,
        ]);
        session()->flash('unbanned', 'Usuario desbaneado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        // Obtenemos los profesores y los ordenamos segun el order_by
        $teachers = User::role('Teacher');

        switch ($this->order_by) {
            case 1: // Ordenar por nombre ascendente
                $teachers = $teachers->orderBy('name', 'asc')->get();
                break;
            
            case 2: // Ordenar por nombre descendente
                $teachers = $teachers->orderBy('name', 'desc')->get();
                break;
        }

        if ($this->search_by) {
            // Buscamos por nombre de profesor
            $teachers = User::role('Teacher')
                ->where('name', 'like', '%' . $this->search_by . '%')
                ->get();
        }

        return view('livewire.teachers.teacher-list', compact('teachers'));
    }
}
