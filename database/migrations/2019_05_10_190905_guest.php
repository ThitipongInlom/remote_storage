<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Guest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Guset V 0.1
        */
        Schema::create('guests', function (Blueprint $table) {
            $table->bigIncrements('guests_id');
            $table->string('sticker_number')->nullable();
            $table->string('guest_dep')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
