<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders  = Order::all();
        return response()->json($request);
    }


    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }
}
