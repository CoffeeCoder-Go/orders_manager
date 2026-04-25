<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsList extends Component
{
    /**
     * Create a new component instance.
     */
    public iterable $products;

    public function __construct(iterable $products)
    {
        //
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.products-list');
    }
}
