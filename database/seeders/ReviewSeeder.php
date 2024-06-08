<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 reviews para el primer profesor
        $reviews = [
            [
                'user_id' => 1,
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'rating' => 5,
                'content' => 'Excelente profesor, muy recomendado',
            ],
            [
                'user_id' => 1,
                'name' => 'David',
                'email' => 'david@gmail.com',
                'rating' => 4,
                'content' => 'Muy buen profesor, pero a veces se retrasa',
            ],
            [
                'user_id' => 1,
                'name' => 'María',
                'email' => 'maria@gmail.com',
                'rating' => 5,
                'content' => 'Muy buen profesor, siempre atento',
            ],
            [
                'user_id' => 1,
                'name' => 'Carlos',
                'email' => 'carlos@gmail.com',
                'rating' => 3,
                'content' => 'Buen profesor, pero a veces no explica bien',
            ],
            [
                'user_id' => 1,
                'name' => 'Ana',
                'email' => 'ana@gmail.com',
                'rating' => 5,
                'content' => 'Excelente profesor, muy recomendado',
            ],
            [
                'user_id' => 1,
                'name' => 'Pedro',
                'email' => 'pedro@gmail.com',
                'rating' => 4,
                'content' => 'Muy buen profesor, pero a veces se retrasa',
            ],
            [
                'user_id' => 1,
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'rating' => 5,
                'content' => 'Muy buen profesor, siempre atento',
            ],
            [
                'user_id' => 1,
                'name' => 'Luis',
                'email' => 'luis@gmail.com',
                'rating' => 3,
                'content' => 'Buen profesor, pero a veces no explica bien',
            ],
            [
                'user_id' => 1,
                'name' => 'Elena',
                'email' => 'elena@gmail.com',
                'rating' => 5,
                'content' => 'Excelente profesor, muy recomendado',
            ],
            [
                'user_id' => 1,
                'name' => 'Marta',
                'email' => 'marta@gmail.com',
                'rating' => 4,
                'content' => 'Muy buen profesor, pero a veces se retrasa',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
