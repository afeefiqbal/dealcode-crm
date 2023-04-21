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
        Schema::create('product_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('user_id');
            $table->foreignId('deal_type_id');
            $table->foreignId('category_id');
            $table->foreignId('deal_trend_id');
            $table->double('price', 8, 2);
            $table->foreignId('currency_id');
            $table->text('notes')->nullable();
            $table->text('deal_url');
            $table->text('product_url');
            $table->text('additional_description');
            $table->timestamp('approved_at')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('product_listings');
    }
};
