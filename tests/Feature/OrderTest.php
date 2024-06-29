<?php

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethod(): void
    {
        $order = Order::factory()->create([
            'customer_name' => 'Teste Batata',
            'status' => 'PENDENTE',
            'description' => 'Fugiat ad non facere iste et et sed. Temporibus magnam possimus quos qui similique magni optio. Accusantium enim ea architecto ullam. Velit velit voluptatum quos eos.',
            'quantity' => 42,
        ]);

        $request = new Request([
            'name' => 'Teste Batata',
            'status' => 'PENDENTE',
        ]);

        $response = $this->json('GET', '/api/orders', $request->toArray());
        $response->assertStatus(200);
    }
}
