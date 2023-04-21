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
            $table->string('transaction_type')->nullable();
            $table->foreignId('to_user')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('at_price')->nullable();
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
            $table->dropColumn('transaction_type');
            $table->dropColumn('to_user');
            $table->dropColumn('date');
            $table->dropColumn('at_price');
        });
    }
};
