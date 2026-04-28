<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Order;

class ItemForm extends Component
{
    /**
     * Create a new component instance.
     */
    public Order $order;
    public $products;


    public function __construct(Order $order,mixed $products)
    {
        //
        $this->order = $order;

        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-form');
    }
}
