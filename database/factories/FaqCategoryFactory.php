<?php

namespace Database\Factories;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqCategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
        ];
    }
}