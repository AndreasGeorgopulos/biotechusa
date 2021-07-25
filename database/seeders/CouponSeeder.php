<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'campaign_id' => 1,
                'code' => 'COUPON_01',
                'discount_value' => 10,
                'discount_type' => 1,
            ],
            [
                'campaign_id' => 1,
                'code' => 'COUPON_02',
                'discount_value' => 100,
                'discount_type' => 2,
            ],
        ];

        foreach ($coupons as $data) {
            $coupon = new Coupon();
            $coupon->fill($data);
            $coupon->save();
        }
    }
}
