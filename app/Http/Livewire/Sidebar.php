<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Services\PriceService;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
{
    public array $selected = [
        'prices'        => [],
        'categories'    => [],
        'manufacturers' => [],
    ];

    public function render(PriceService $priceService): View
    {
        $prices = $priceService->getPrices(
            [],
            $this->selected['categories'],
            $this->selected['manufacturers']
        );

        $categories = Category::withCount(['products'])
            ->get();

        $manufacturers = Manufacturer::withCount(['products'])
            ->get();

        return view('livewire.sidebar', compact('prices', 'categories', 'manufacturers'));
    }
}
