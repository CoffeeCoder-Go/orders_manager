<?php

namespace App\View\Components;

use App\Models\Item;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public Item $item;
    

    public function __construct(Item $item)
    {
        //
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-component');
    }
}
