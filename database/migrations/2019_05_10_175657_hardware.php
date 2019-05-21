<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Hardware V 0.1
        */
        Schema::create('hardwares', function (Blueprint $table) {
            $table->bigIncrements('hardware_id');
            $table->string('sticker_number')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('case')->nullable();
            $table->string('mouse')->nullable();
            $table->string('keyboard')->nullable();
            $table->string('mainboard')->nullable();
            $table->string('powersupply')->nullable();
            $table->string('hdd')->nullable();
            $table->string('ssd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardwares');
    }
}
