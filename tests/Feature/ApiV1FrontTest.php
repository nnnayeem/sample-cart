<?php

namespace Tests\Feature;

use App\Traits\TestTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiV1FrontTest extends TestCase
{
    use TestTrait;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_api_working()
    {
        $response = $this->get('/api/V1/front/products');
        $response->assertStatus(200);
        $this->assertSuccessfulResponse($response);
    }
}
