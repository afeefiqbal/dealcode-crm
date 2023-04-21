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
        Schema::table('transactions', function (Blueprint $table) {
            $table->double('purchase_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->string('notes')->nullable()->change();
            $table->string('buyer_name')->nullable()->change();
            $table->string('buyer_email')->nullable()->change();
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('purchase_price');
            $table->dropColumn('sale_price');
            $table->string('notes')->change();
            $table->string('buyer_name')->change();
            $table->string('buyer_email')->change();
            $table->double('price');
        });
    }
};
