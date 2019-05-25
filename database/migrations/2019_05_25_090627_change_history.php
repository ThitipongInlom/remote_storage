<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            ChangeHistory V 0.1
        */
        Schema::create('changehistorys', function (Blueprint $table) {
            $table->bigIncrements('changehistory_id');
            $table->string('sticker_number')->nullable();
            $table->string('item_type')->nullable();
            $table->string('item_old')->nullable();
            $table->string('item_change')->nullable();
            $table->string('item_status')->nullable();
            $table->string('remark')->nullable();
            $table->string('users_change')->nullable();
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
        Schema::dropIfExists('changehistorys');
    }
}
