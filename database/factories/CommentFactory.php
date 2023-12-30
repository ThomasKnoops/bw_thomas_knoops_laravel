<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => $this->faker->numberBetween(1, 11),
            'news_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}