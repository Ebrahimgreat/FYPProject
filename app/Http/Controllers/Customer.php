<?php

namespace App\Http\Controllers;

use App\Events\customerCreated;
use Illuminate\Http\Request;
use App\Models\Customers;

class Customer extends Controller
{
    public function index()
    {
        $customers = Customers::all()->toArray();
        return response()->json($customers);
    }
    public function store()
    {
        Customer::factory()->afterCreating(function ($customer) {
            event(new customerCreated($customer));

        })
            ->count(10)->create();
        return response()->json('Customer created!');
    }
    //
}
