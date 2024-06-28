<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfOrders = 2000;

        for($i=1; $i<=$numberOfOrders; $i++){
            Order::create([
                'status' => 'P', //pendente
                'customer_name' => 'Customer '.$i,
                'descriptiion' => 'Description for order '.$i,
                'quantity' => rand(1,10),
            ]);
        }
    }
}
