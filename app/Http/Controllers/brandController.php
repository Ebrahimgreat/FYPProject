<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brands;

class brandController extends Controller
{
    public function index()
    {
        return response()->json(brands::all(),200);

    }
    //
}
