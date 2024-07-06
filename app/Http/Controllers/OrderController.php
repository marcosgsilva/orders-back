<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $query->skip(0)->take(2000);

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

    public function getByStatus(Request $request)
    {
        try {
            Log::info('Executing getByStatus query');

            $ordersQuery = DB::table('orders')
                ->select(
                    DB::raw('EXTRACT(YEAR FROM created_at) as year'),
                    DB::raw('EXTRACT(MONTH FROM created_at) as month'),
                    'status',
                    DB::raw('COUNT(*) as count')
                )
                ->groupBy('year', 'month', 'status')
                ->orderBy('year')
                ->orderBy('month')
                ->orderBy('status');

                if($request->query('status')){
                    $ordersQuery->where('status', $request->query('status'));
                }
                if($request->query('customer_name')){
                    $ordersQuery->where('customer_name','like','%'. $request->query('customer_name').'%');
                }
                if($request->query('description')){
                    $ordersQuery->where('description','like','%'. $request->query('description').'%');
                }
                if($request->query('quantity')){
                    $$ordersQuery->where('quantity', $request->query('quantity'));
                }

                $orders = $ordersQuery->get();

            return response()->json(['data' => $orders], 200);

        } catch (Exception $exec) {
            Log::error('Erro ao executar getByStatus query', [
                'message' => $exec->getMessage(),
                'trace' => $exec->getTraceAsString(),
            ]);
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
