<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'            => $this->faker->word(),
            'category_id'     => Category::inRandomOrder()->first()->id,
            'manufacturer_id' => Manufacturer::inRandomOrder()->first()->id,
            'description'     => $this->faker->paragraph(),
            'price'           => rand(10, 999)
        ];
    }
}
