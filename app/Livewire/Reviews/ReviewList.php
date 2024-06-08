<?php

namespace App\Livewire\Reviews;

use App\Models\Review;
use Livewire\Component;

class ReviewList extends Component
{
    // Variables para buscar y ordenar las valoraciones
    public $search_by = null;
    public $order_by = 1;

    /**
     * Funcion para borrar una valoracion
     */
    public function delete($id)
    {
        $review = Review::find($id);
        $review->delete();
        session()->flash('deleted', 'Valoración eliminada con éxito');
    }

    /**
     * Renderizar vista
     */
    public function render()
    {
        // Obtenemos los profesores y los ordenamos segun el order_by
        $reviews = Review::query();

        switch ($this->order_by) {
            case 1: // Ordenar por valoraciones mas positivas
                $reviews = $reviews->orderBy('rating', 'desc')->get();
                break;
                
            case 2: // Ordenar por valoracioones mas negativas
                $reviews = $reviews->orderBy('rating', 'asc')->get();
                break;
        }

        if ($this->search_by) {
            // Buscamos por nombre de profesor, o por cualquier campo de la valoracion
            $reviews = Review::query()
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->where(function ($query) {
                    $query->where('users.name', 'like', '%' . $this->search_by . '%')
                        ->orWhere('reviews.name', 'like', '%' . $this->search_by . '%')
                        ->orWhere('reviews.content', 'like', '%' . $this->search_by . '%');
                })
                ->select('reviews.*')
                ->get();
        }

        return view('livewire.reviews.review-list', compact('reviews'));
    }
}
