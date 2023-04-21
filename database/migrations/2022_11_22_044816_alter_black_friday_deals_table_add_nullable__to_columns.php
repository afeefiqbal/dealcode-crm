<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('black_friday_deals', function (Blueprint $table) {
            $table->string('deal_details')->nullable()->change();
            $table->string('tier_1')->nullable()->change();
            $table->string('tier_2')->nullable()->change();
            $table->string('tier_3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('columns', function (Blueprint $table) {
            //
        });
    }
};
