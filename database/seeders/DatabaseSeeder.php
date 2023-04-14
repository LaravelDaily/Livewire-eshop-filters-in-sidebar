<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        Category::factory(5)->create();
        Manufacturer::factory(5)->create();
        Product::factory(20)->create();
    }
}
