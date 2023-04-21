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
        Schema::create('black_friday_deals', function (Blueprint $table) {
            $table->id();
            $table->string('deal_name');
            $table->string('url');
            $table->string('from_date');
            $table->string('to_date');
            $table->string('year');
            $table->string('discount');
            $table->string('coupon_code');
            $table->string('deal_details');
            $table->string('tier_1');
            $table->string('tier_2');
            $table->string('tier_3');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('black_friday_deals');
    }
};
