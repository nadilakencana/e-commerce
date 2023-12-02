<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Detail_Orders;
class OrderController extends Controller
{
    public function DataOrder(){
        $order = Orders::all();
        return view('Dashboard.Orders.index', compact('order'));
    }
}
