<?php

namespace App\Livewire\Modal;

use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Subjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Variable de busqueda
    public $search;

    /**
     * Asignar categoria al usuario
     */
    public function addSubject($categoryId)
    {
        auth()->user()->subjects()->attach($categoryId);
    }
    
    /**
     * Remover categoria al usuario
     */
    public function removeSubject($categoryId)
    {
        auth()->user()->subjects()->detach($categoryId);
    }

    /**
     * Guardar cambios
     */
    public function save(){
        $teacher = User::find(auth()->id());
        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        $user_categories = auth()->user()->subjects->pluck('id')->toArray();
        $subjects = Subject::paginate(6);

        // Si se realiza una busqueda
        if ($this->search) {
            $subjects = Subject::where('name', 'like', "%{$this->search}%")->paginate(6);
        }
        return view('livewire.modal.subjects', compact('user_categories', 'subjects'));
    }
}
