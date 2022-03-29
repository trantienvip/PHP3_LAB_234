<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'title', 'description', 'price', 'cate_id', 'images', 'slug'
        $title = $this->faker->name();
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(5000, 500000),
            'cate_id' => $this->faker->numberBetween(1, 3),
            'images' => $this->faker->imageUrl(100, 100),
            'slug' => $slug,
        ];
    }
}
