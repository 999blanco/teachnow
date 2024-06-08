<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Livewire\Component;

class Education extends Component
{
    // Variables para almacenar la información de la educación del profesor
    public $education = [];
    public $currentAction = 'show';

    public $degree, $school, $year; // Para editar
    public $new_degree, $new_school, $new_year; // Para agregar nuevo

    /**
     * Obtener la información de la educación del profesor existente
     */
    public function mount(User $teacher)
    {
        $this->education = json_decode($teacher->education, true);
        if (empty($this->education)) {
            $this->education = [];
        }
    }

    /**
     * Crear nueva educación del profesor
     */
    public function store(){
        $this->validate([
            'new_school' => 'required',
            'new_degree' => 'required',
            'new_year' => 'required',
        ]);

        $this->education[] = [
            'school' => $this->new_school,
            'degree' => $this->new_degree,
            'year' => $this->new_year,
        ];

        $this->currentAction = 'show';
    }

    /**
     * Mostrar formulario para editar educación obteniendo los datos del index
     */
    public function edit($index)
    {
        $this->currentAction = 'edit';
        $this->school = $this->education[$index]['school'];
        $this->degree = $this->education[$index]['degree'];
        $this->year = $this->education[$index]['year'];
    }

    /**
     * Actualizar la educación del profesor
     */
    public function update($index)
    {
        $this->validate([
            'school' => 'required',
            'degree' => 'required',
            'year' => 'required',
        ]);

        $this->education[$index] = [
            'school' => $this->school,
            'degree' => $this->degree,
            'year' => $this->year,
        ];

        $this->currentAction = 'show';
    }

    /**
     * Eliminar la educación del profesor
     */
    public function delete($index)
    {
        unset($this->education[$index]);
        $this->education = array_values($this->education);
    }

    /**
     * Cerrar el modal y guardar la información de la educación del profesor
     */
    public function close(){
        $teacher = User::find(auth()->id());
        $teacher->education = json_encode($this->education);
        $teacher->save();

        return redirect()->route('teacher', $teacher->slug)->with('success', 'Perfil modificado con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        return view('livewire.modal.education');
    }
}
