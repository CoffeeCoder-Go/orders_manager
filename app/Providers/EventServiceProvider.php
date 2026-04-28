<?php
namespace App\Providers;

use App\Events\OrderValue;
use App\Events\ProductQuantity;
use App\Listeners\DecrementProductQuantity;
use App\Listeners\IncrementOrderValue;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider{
    protected $listen = [
        ProductQuantity::class => [
            DecrementProductQuantity::class
        ],
        OrderValue::class => [
            IncrementOrderValue::class
        ]
    ];
}