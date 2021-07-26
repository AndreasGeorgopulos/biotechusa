<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    const TABLE_USERS = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::TABLE_USERS, function(Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('password');
            $table->boolean('is_admin')->default(false)->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_USERS, function(Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('is_admin');
        });
    }
}
