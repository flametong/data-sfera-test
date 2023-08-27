<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;

class HomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        $orders  = Order::all();
        $sales   = Sale::all();
        $stocks  = Stock::all();

        return view(
            'home', 
            compact(
                'incomes', 
                'orders',
                'sales',
                'stocks'
            )
        );
    }
}
