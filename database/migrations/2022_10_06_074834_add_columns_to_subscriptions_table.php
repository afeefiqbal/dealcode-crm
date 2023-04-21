<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('start_at')->nullable();
            $table->string('notes')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->dropColumn('payment_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('start_at');
            $table->dropColumn('notes');
            $table->dropColumn('category_id');
            $table->timestamp('payment_at');
        });
    }
};
