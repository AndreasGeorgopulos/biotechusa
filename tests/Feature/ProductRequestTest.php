<?php

namespace Tests\Feature;

use App\Http\Requests\ProductRequest;
use Tests\RequestAdapter;
use Tests\TestCase;

class ProductRequestTest extends TestCase
{
    use RequestAdapter;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_request_test()
    {
        $this->validateRequest([
            'campaign_id' => 1,
            'name' => 'Product for August 2021',
            'price' => 990.50,
            'published_at' => '2021-07-02 00:00:00',
        ], ProductRequest::class);
    }
}
