<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            StoreMain V 0.1  
        */
        Schema::create('storemains', function (Blueprint $table) {
            $table->bigIncrements('storemain_id');
            $table->string('item_type')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_brand')->nullable();
            $table->string('item_model')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('mac_number')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('date_item_in')->nullable();
            $table->string('item_in_stock')->nullable();
            $table->string('location_use')->nullable();
            $table->date('date_location_out')->nullable();
            $table->string('location_lend')->nullable();
            $table->string('user_lend')->nullable();
            $table->date('date_lend_out')->nullable();
            $table->date('date_lend_in')->nullable();
            $table->string('item_img')->nullable();
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
        Schema::dropIfExists('storemains');
    }
}
