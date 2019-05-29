<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Hotel V 0.1
        */
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('hotel_id');
            $table->string('hotel_titel');
        });
        // Insert Windows V 0.1
        DB::table('hotels')->insert([
            ['hotel_titel' => 'The Zign'],
            ['hotel_titel' => 'Tsix5'],
            ['hotel_titel' => 'Z2'],
            ['hotel_titel' => 'Way'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
