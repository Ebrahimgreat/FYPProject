<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;

class unitsController extends Controller
{
    public function index()
    {
        $units=Units::all();
        return response()->json($units);



    }
    //
}
