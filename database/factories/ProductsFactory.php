<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'quantity' => $this->faker->numberBetween(1, 20),
            'price' => $this->faker->randomFloat(2, 10, 9999.99),
            'category_id' => Category::factory(),
            'promo' => $this->faker->numberBetween(0, 100),
        ];
    }
}
