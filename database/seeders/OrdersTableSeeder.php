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

        for ($i = 1; $i <= $numberOfOrders; $i++) {
            if ($i > 0 && $i <= 300) {
                Order::create([
                    'status' => 'SUCESSO', //pendente
                    'customer_name' => 'Cliente ' . $i,
                    'description' => 'Descrição do cliente ' . $i,
                    'quantity' => rand(1, 10),
                ]);
            } else  if ($i > 300 && $i <= 400) {
                Order::create([
                    'status' => 'CANCELADO', //pendente
                    'customer_name' => 'Cliente ' . $i,
                    'description' => 'Descrição do cliente ' . $i,
                    'quantity' => rand(1, 10),
                ]);
            } else  if ($i > 400) {
                Order::create([
                    'status' => 'PENDENTE', //pendente
                    'customer_name' => 'Cliente ' . $i,
                    'description' => 'Descrição do cliente  ' . $i,
                    'quantity' => rand(1, 10),
                ]);
            }
        }
    }
}
