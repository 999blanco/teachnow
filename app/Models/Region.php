<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relacion de uno a muchos con la tabla users
    public function users(){
        return $this->hasMany(User::class);
    }
}
