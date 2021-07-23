<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    const TABLE_PRODUCTS = 'products';
    const TABLE_CAMPAIGNS = 'campaigns';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PRODUCTS, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('campaign_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->timestamp('published_at');
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
        Schema::dropIfExists(self::TABLE_PRODUCTS);
    }
}
