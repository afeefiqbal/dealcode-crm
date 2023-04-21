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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('provider_id');
            $table->timestamp('payment_at');
            $table->string('billing_cycle_count');
            $table->string('billing_cycle_type');
            $table->double('price');
            $table->foreignId('currency_id');
            $table->string('folder');
            $table->string('refund_days');
            $table->timestamp('expired_at')->nullable();
            $table->foreignId('payment_method_id');
            $table->string('support_email');
            $table->string('deal_url');
            $table->foreignId('product_id');
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
        Schema::dropIfExists('subscriptions');
    }
};
