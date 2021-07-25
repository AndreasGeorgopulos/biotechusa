<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCouponsTable extends Migration
{
    const TABLE_COUPONS = 'coupons';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::TABLE_COUPONS, function (Blueprint $table) {
            $table->timestamp('activated_at')->comment('Time of activated')->after('discount_type')->nullable();
            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_COUPONS, function (Blueprint $table) {
            $table->dropColumn(['activated_at']);
        });
    }
}
