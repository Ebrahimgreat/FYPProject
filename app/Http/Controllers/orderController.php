<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $customers=[];
        foreach($orders as $order){
            $customers[]=$order->customer->first_name;
        }
        return response()->json(['Customer'=>$customers]);
    }
    //
}
