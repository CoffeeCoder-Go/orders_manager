<?php

namespace App\Listeners;

use App\Events\OrderValue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncrementOrderValue
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
    public function handle(OrderValue $event): void
    {
        //
        $event->order->value += $event->item->value;
        $event->order->save();
    }
}
