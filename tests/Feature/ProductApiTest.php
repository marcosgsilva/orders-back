<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class ProductApiTest extends TestCase
{

    /**
     * Teste Basic
     */
     public function testGetAllProducts(){
        $mockProducts = [
            ['id'=>1, 'name'=>'Product 1'],
            ['id'=>2, 'name'=>'Product 2'],
            ['id'=>3, 'name'=>'Product 3'],
        ];

        $productMock = Mockery::mock('overload:App\Models\Product');
        $productMock->shouldReceive('all')
                    ->andReturn(collect($mockProducts));

        $response = $this->get('/api/products');

        $response->assertStatus(200)
                 ->assertJson($mockProducts);
     }



}
