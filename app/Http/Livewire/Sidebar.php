<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Services\PriceService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class Sidebar extends Component
{
    public array $categories = [];
    public array $manufacturers = [];

    public array $selected = [
        'prices'        => [],
        'categories'    => [],
        'manufacturers' => [],
    ];

    public function updatedSelected(): void
    {
        $this->emit('updatedSidebar', $this->selected);
    }

    public function render(PriceService $priceService): View
    {
        $prices = $priceService->getPrices(
            [],
            $this->selected['categories'],
            $this->selected['manufacturers']
        );

        $this->categories = Category::withCount(['products' => function (Builder $query) {
            $query->withFilters(
                $this->selected['prices'],
                [],
                $this->selected['manufacturers']
            );
        }])
            ->get()
            ->toArray();

        $this->manufacturers = Manufacturer::withCount(['products' => function (Builder $query) {
            $query->withFilters(
                $this->selected['prices'],
                $this->selected['categories'],
                []
            );
        }])
            ->get()
            ->toArray();

        return view('livewire.sidebar', compact('prices'));
    }
}
