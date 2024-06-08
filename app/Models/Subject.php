<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Key de la ruta implicita
    public function getRouteKey()
    {
        return 'slug';
    }

    // Relacion uno a muchos con la tabla teachers_subjects
    public function teachers(){
        return $this->belongsToMany(User::class, 'teachers_subjects');
    }
}
