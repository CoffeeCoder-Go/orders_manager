<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;

class ItemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(?User $user, Item $item):bool
    {
        //
        return $user->id == $item->user_id;
    }
}
