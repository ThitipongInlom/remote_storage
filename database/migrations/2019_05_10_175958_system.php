<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class System extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            System V 0.1
        */
        Schema::create('systems', function (Blueprint $table) {
            $table->bigIncrements('system_id');
            $table->string('sticker_number');
            $table->string('computer_name');
            $table->string('ip_1');
            $table->string('ip_2');
            $table->string('teamviewer');
            $table->string('anydesk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
