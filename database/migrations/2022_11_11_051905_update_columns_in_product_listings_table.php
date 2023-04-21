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
        Schema::table('product_listings', function (Blueprint $table) {
            $table->dropColumn('purchase_price');
            $table->dropColumn('sale_price');
            $table->dropColumn('whom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_listings', function (Blueprint $table) {
            $table->string('purchase_price');
            $table->string('sale_price');
            $table->string('whom');
        });
    }
};
