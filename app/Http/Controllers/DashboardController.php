<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('dashboard', ['sales' => $sales]);
    }

    public function liveData()
    {
        $sales = Sale::all();
        return response()->json($sales);
    }
}
