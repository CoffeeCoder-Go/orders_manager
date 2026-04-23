<?php

namespace App\View\Components;

use App\Enums\FormType;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductForm extends Component
{
    /**
     * Create a new component instance.
     */
    public Product $product;
    public FormType $type;

    public function __construct(Product $product, FormType $type)
    {
        //
        $this->product = $product;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-form');
    }
}
