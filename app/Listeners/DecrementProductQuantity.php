<?php

namespace App\Listeners;

use App\Events\ProductQuantity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DecrementProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductQuantity $event): void
    {
        //
        $event->product->quantity -= $event->item->quantity;
        $event->product->save();
    }
}
