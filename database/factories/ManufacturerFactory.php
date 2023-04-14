<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
