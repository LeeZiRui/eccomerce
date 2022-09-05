<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'main_image' => $this->faker->imageUrl(),
            'title_en' => $this->faker->title(),
            'title_ar' => $this->faker->title(),
            'description_en' => $this->faker->text,
            'description_ar' => $this->faker->text,
            'price' => rand(1,99999),
        ];
    }
}
