<?php

namespace App\View\Components;

use App\Enums\FormType;
use App\Models\Order;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderForm extends Component
{
    /**
     * Create a new component instance.
     */
    public Order $order;
    public FormType $type;

    public function __construct(Order $order, FormType $type)
    {
        //
        $this->order = $order;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-form');
    }
}
