<?php

namespace App\Listeners;

use App\Events\customerCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\order;

class defaultOrder
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
    public function handle(customerCreated $event): void
    {
        $event = collect($event);
        Order::create(['customer_id' => $event->pluck('id')->first()]);


        //
    }
}
