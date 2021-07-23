<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    const TABLE_POSTS = 'posts';
    const TABLE_CAMPAIGNS = 'campaigns';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_POSTS, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->bigInteger('campaign_id')->unsigned();
            $table->string('title');
            $table->text('description');
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
        Schema::dropIfExists(self::TABLE_POSTS);
    }
}
