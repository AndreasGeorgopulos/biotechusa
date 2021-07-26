<?php

namespace Tests\Feature;

use App\Http\Requests\CouponActivateRequest;
use Tests\RequestAdapter;
use Tests\TestCase;

class CouponActivateTest extends TestCase
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
            'code' => 'COUPON_01',
        ], CouponActivateRequest::class);
    }
}
