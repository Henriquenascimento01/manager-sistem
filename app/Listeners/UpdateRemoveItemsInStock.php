<?php

namespace App\Listeners;

use App\Events\UserOrderedItems;
use App\Services\ProductStockManager;
use App\Models\Orders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateRemoveItemsInStock
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
     * @param  \App\Events\UserOrderedItems  $event
     * @return void
     */
    public function handle(UserOrderedItems $event)
    {
        // ProductStockManager::remove_product_from_stock($event->user_order);
       //  (new ProductStockManager($event->user_order))->remove_product_from_stock();
    }
}
