<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    const TABLE_COUPONS = 'coupons';
    const TABLE_CAMPAIGNS = 'campaigns';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_COUPONS, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('campaign_id')->unsigned();
            $table->string('code')->comment('Coupon code');
            $table->float('discount_value')->comment('Percent or amount value');
            $table->tinyInteger('discount_type')->comment('1 - by percent, 2 - by amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_id')->references('id')->on(self::TABLE_CAMPAIGNS);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_COUPONS);
    }
}
