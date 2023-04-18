<?php

namespace App\Services;

use App\Models\Product;

class PriceService
{
    private array $prices;
    private int $categories;
    private int $manufactures;

    public function getPrices($prices, $categories, $manufactures): array
    {
        $this->manufactures = $manufactures;
        $this->categories = $categories;
        $this->prices = $prices;
        $formattedPrices = [];

        foreach (Product::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name'           => $name,
                'products_count' => $this->getProductCount($index),
            ];
        }

        return $formattedPrices;
    }

    private function getProductCount($index): int
    {
        return Product::count();
    }
}
