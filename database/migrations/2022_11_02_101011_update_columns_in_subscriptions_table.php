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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('refund_days')->nullable()->change();
            $table->string('folder')->nullable()->change();
            $table->string('support_email')->nullable()->change();
            $table->string('deal_url')->nullable()->change();
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
            $table->string('refund_days')->change();
            $table->string('folder')->change();
            $table->string('support_email')->change();
            $table->string('deal_url')->change();
        });
    }
};
