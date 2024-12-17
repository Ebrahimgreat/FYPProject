<?php

namespace App\Observers;

use App\Events\customerCreated;
use App\Models\Customers;

class customerobserver
{
    /**
     * Handle the Customers "created" event.
     */
    public function created(Customers $customers): void
    {
        event(new CustomerCreated($customers));
        //
    }

    /**
     * Handle the Customers "updated" event.
     */
    public function updated(Customers $customers): void
    {
        //
    }

    /**
     * Handle the Customers "deleted" event.
     */
    public function deleted(Customers $customers): void
    {
        //
    }

    /**
     * Handle the Customers "restored" event.
     */
    public function restored(Customers $customers): void
    {
        //
    }

    /**
     * Handle the Customers "force deleted" event.
     */
    public function forceDeleted(Customers $customers): void
    {
        //
    }
}
