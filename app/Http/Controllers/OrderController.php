<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query  = Order::query();

        foreach ($request->all() as $key => $value) {
            if (in_array($key, Schema::getColumnListing('orders')) && !empty($value)) {
                $query->where($key, 'LIKE', "%{$value}%");
            }
        }

        $orders = $query->get();

        return response()->json($orders)
            ->header('Cache-Control', 'no-cache,no-store,must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }


    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }
}
