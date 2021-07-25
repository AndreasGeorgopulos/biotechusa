<?php

namespace Tests\Feature;

use App\Http\Requests\CouponRequest;
use Tests\RequestAdapter;
use Tests\TestCase;

class CouponRequestTest extends TestCase
{
    use RequestAdapter;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->validateRequest([
            'campaign_id' => 1,
            'code' => 'COUPON_03',
            'discount_value' => 20.5,
            'discount_type' => 1,
        ], CouponRequest::class);
    }
}
