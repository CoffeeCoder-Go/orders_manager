<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(?User $user,Order $order): bool
    {
        //
        return $user->id == $order->user_id;
    }

    public function update(?User $user, Order $order): bool
    {
        return $user->id == $order->user_id;
    }
}
