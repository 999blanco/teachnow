<?php

namespace App\Livewire\Subjects;

use App\Models\Subject;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SubjectList extends Component
{
    use WithFileUploads;
    
    // Varaible para buscar una materia
    public $search_by;

    // Variables para el edit y la creacion de una materia
    public $subject_id, $subject_name, $subject_image, $subject_new_image;

    /**
     * Obtener la información de la materia existente
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $this->subject_id = $subject->id;
        $this->subject_name = $subject->name;
        $this->subject_image = $subject->image;
    }

    /**
     * Actualizar la información de la materia
     */
    public function update()
    {
        $this->validate([
            'subject_name' => 'required',
            'subject_new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $subject = Subject::find($this->subject_id);
        $imageName = $subject->image;

        // Guardar la nueva imagen de la materia
        if ($this->subject_new_image) {
            // Eliminar la imagen anterior
            if ($imageName) {
                unlink(storage_path('app/public/subjects/' . $imageName));
            }
            $imageName = time() . '.' . $this->subject_new_image->extension();
            $this->subject_new_image->storeAs('public/subjects', $imageName);
        }

        $subject->update([
            'name' => $this->subject_name,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.subjects')->with('updated', 'Materia modificada con éxito');
    }

    /**
     * Eliminar la materia existente
     */
    public function delete($id)
    {
        $subject = Subject::find($id);
        $imageName = $subject->image;

        // Eliminar la imagen de la materia
        if ($imageName) {
            unlink(storage_path('app/public/subjects/' . $imageName));
        }

        $subject->delete();
        session()->flash('deleted', 'Materia eliminada con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        $subjects = Subject::orderBy('name', 'asc')->get();

        if ($this->search_by) {
            // Buscamos por nombre de materia
            $subjects = Subject::query()
                ->where('name', 'like', '%' . $this->search_by . '%')
                ->get();
        }

        return view('livewire.subjects.subject-list', compact('subjects'));
    }
}
