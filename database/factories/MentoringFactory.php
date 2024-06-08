<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Mentoring;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MentoringFactory extends Factory
{
    protected $model = Mentoring::class;

    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'contents_table' => json_encode([
                [
                    'content' => $this->faker->paragraph,
                ],
                [
                    'content' => $this->faker->paragraph,
                ],
                [
                    'content' => $this->faker->paragraph,
                ]
            ]),
            'link' => $this->faker->url,
            'category_id' => Subject::all()->random()->id,
            'topic_id' => Topic::all()->random()->id,
            'user_id' => User::first()->id,
            'start_datetime' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'duration' => $this->faker->numberBetween(0, 120),
            'slots' => $this->faker->randomFloat(0, 1, 10),
            'price' => $this->faker->randomFloat(2, 10, 100)
        ];
    }
}