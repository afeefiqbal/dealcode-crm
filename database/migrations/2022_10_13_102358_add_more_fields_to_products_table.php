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
        Schema::table('products', function (Blueprint $table) {
            //after description column is function
            $table->after('description', function (Blueprint $table) {
                $table->unsignedBigInteger('deal_provider_id')->nullable();
                $table->string('tag_id')->nullable();
                $table->string('price')->nullable();
                $table->string('product_url')->nullable();
            });
            $table->string('license1_tier_price')->nullable();
            $table->text('license1_tier_features')->nullable();
            $table->string('license2_tier_price')->nullable();
            $table->text('license2_tier_features')->nullable();
            $table->string('license3_tier_price')->nullable();
            $table->text('license3_tier_features')->nullable();
            $table->text('tldr')->nullable();
            $table->text('about_all')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
