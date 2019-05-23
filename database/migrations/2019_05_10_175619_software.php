<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Software extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Software V 0.1
        */
        Schema::create('softwares', function (Blueprint $table) {
            $table->bigIncrements('software_id');
            $table->string('sticker_number')->nullable();
            $table->string('teamviewer')->nullable();
            $table->string('anydesk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('softwares');
    }
}
