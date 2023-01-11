<?php

namespace App\Listeners;

use App\Events\UserCancelledOrderItems;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateAddingBackItemsInStock
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCancelledOrderItems  $event
     * @return void
     */
    public function handle(UserCancelledOrderItems $event)
    {
        //
    }
}
