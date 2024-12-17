<?php

namespace App\Providers;

use App\Http\Controllers\Customer;
use App\Observers\customerobserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Customers;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Customers::observe(CustomerObserver::class);
        //
    }
}
