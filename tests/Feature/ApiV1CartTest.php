<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Traits\TestTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiV1CartTest extends TestCase
{
   use TestTrait;

   private User $user;

   public function generateReqData()
   {
       $this->user = User::factory()->create();
       Product::factory()->count(10)->create();
   }

    public function test_orders_can_be_created()
    {
        $this->generateReqData();
        $this->actingAs($this->user);

        $products = Product::inRandomOrder()->limit(4)->pluck('id');

        $productForm = $products->map(function($id){
            return [
                'product_id' => $id,
                'quantity' => rand(1,4),
            ];
        })->toArray();

        $response = $this->post('api/V1/private/order/checkout', [
            'products' => $productForm
        ]);

        $response->assertStatus(200);
        $this->assertSuccessfulResponse($response);
    }

    public function test_validation_without_products_product_id_key()
    {
        $this->generateReqData();
        $this->actingAs($this->user);

        $products = Product::inRandomOrder()->limit(4)->pluck('id');

        $productForm = $products->map(function($id){
            return [
                'quantity' => rand(1,4),
            ];
        })->toArray();

        $response = $this->post('api/V1/private/order/checkout', [
            'products' => $productForm
        ]);

        $response->assertStatus(200);
        $this->assertUnprocessableResponse($response);
    }

    public function test_validation_without_products_quantity_key()
    {
        $this->generateReqData();
        $this->actingAs($this->user);

        $products = Product::inRandomOrder()->limit(4)->pluck('id');

        $productForm = $products->map(function($id){
            return [
                'product_id' => $id,
            ];
        })->toArray();

        $response = $this->post('api/V1/private/order/checkout', [
            'products' => $productForm
        ]);

        $response->assertStatus(200);
        $this->assertUnprocessableResponse($response);
    }


}
