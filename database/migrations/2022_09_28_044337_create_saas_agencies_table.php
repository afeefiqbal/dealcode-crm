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

        Schema::create('saas_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website');
            $table->string('contact_number')->nullable();
            $table->string('expertise');
            $table->string('contact_email');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('saas_agencies');
    }
};
