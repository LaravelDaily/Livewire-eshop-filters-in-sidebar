<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class Products extends Component
{
    public function render(): View
    {
        $products = Product::all();

        return view('livewire.products', compact('products'));
    }
}
