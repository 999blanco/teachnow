<?php

namespace App\Livewire\Subjects;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddSubject extends Component
{
    use WithFileUploads;
    // Variable para almacenar el nombre y la imagen de la materia
    public $name, $image;

    /**
     * Validar y guardar la información de la materia
     */
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Guardar la nueva imagen de la materia
        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('public/subjects', $imageName);

        // Crear la materia
        Subject::create([
            'name' => $this->name,
            'image' => $imageName,
            'slug' => Str::slug($this->name),
        ]);

        return redirect()->route('admin.subjects')->with('created', 'Materia creada con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.subjects.add-subject');
    }
}
