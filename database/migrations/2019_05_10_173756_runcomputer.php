<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Runcomputer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Runcomputer V 0.1
        */
        Schema::create('runcomputers', function (Blueprint $table) {
            $table->bigIncrements('runcomputer_id');
            $table->string('sticker_number')->nullable();
            $table->string('runcomputers_dep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runcomputers');
    }
}
