<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reviews extends Component
{
    public $reviews;
    public $teacher;
    public $score;

    // Variable para nueva reseña
    public $nuevaReseña = false;

    // Variables para crear una nueva valoracion
    public $name, $email, $content;
    public $rating, $hoverRating;

    /**
     * Obtener las reseñas del profesor
     */
    public function mount(User $teacher)
    {
        $this->teacher = $teacher;
        $this->reviews = $teacher->reviews->sortByDesc('created_at');
        $this->score = $teacher->reviews->avg('rating');
        
        // Si el profesor tiene 0 reseñas, asignamos true al nuevaReseña
        if ($teacher->reviews->count() == 0) {
            $this->nuevaReseña = true;
        }
        if (Auth::check() && Auth::user()->id == $teacher->id){
            $this->nuevaReseña = false;
        }
    }

    /**
     * Funcion para crear una nueva valoracion
     */
    public function store(){
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:100',
            'rating' => 'required',
            'content' => 'required|max:500',
        ]);

        $this->teacher->reviews()->create([
            'name' => $this->name,
            'email' => $this->email,
            'rating' => $this->rating,
            'content' => $this->content,
        ]);

        $this->reviews = $this->teacher->reviews;
        $this->nuevaReseña = false;
    }

    /**
     * Funcion para cancelar la creacion de una nueva valoracion
     */
    public function cancel(){
        // Limpiamos los campos y ocultamos el formulario
        $this->nuevaReseña = false;
        $this->resetErrorBag();
        $this->reset(['name', 'email', 'content', 'rating']);
    }

     /**
     * Función para establecer la valoración
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * Función para guardar la valoración al pasar el ratón y mostra la clase del color
     */
    public function setHoverRating($rating)
    {
        $this->hoverRating = $rating;
    }

    public function render()
    {
        return view('livewire.modal.reviews');
    }
}
