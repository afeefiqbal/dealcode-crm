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
        Schema::table('deal_providers', function (Blueprint $table) {
            $table->string('code');
            $table->string('type');
            $table->string('short_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deal_providers', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('type');
            $table->dropColumn('short_description');
        });
    }
};