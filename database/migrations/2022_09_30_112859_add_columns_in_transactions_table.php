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
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->timestamp('sold_date')->default(now());
            $table->string('notes');
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
            $table->dropColumn('buyer_name');
            $table->dropColumn('buyer_email');
            $table->dropColumn('sold_date');
            $table->dropColumn('notes');
        });
    }
};
