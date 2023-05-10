<?php

namespace App\Listeners;

use App\Events\PurchaseSuccessful;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class UpdateInventoryAfterPurchase
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
     * @param  \App\Events\PurchaseSuccessfule  $event
     * @return void
     */
    public function handle(PurchaseSuccessful $event)
    {
        Log::info('This is some useful information.');
        $purchase = $event->purchase;
        foreach (json_decode($purchase->items) as $item) {
            Product::find($item->id)->decrement('quantity', $item->quantity);
        }
    }
}
