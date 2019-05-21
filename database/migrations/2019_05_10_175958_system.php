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
            $table->string('sticker_number')->nullable();
            $table->string('computer_name')->nullable();
            $table->string('ip_main')->nullable();
            $table->string('ip_sub')->nullable();
            $table->string('teamviewer')->nullable();
            $table->string('anydesk')->nullable();
            $table->string('windows')->nullable();
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
