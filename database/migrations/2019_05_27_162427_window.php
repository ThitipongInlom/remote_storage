<?php

use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Window extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Window V 0.1
        */
        Schema::create('windows', function (Blueprint $table) {
            $table->bigIncrements('window_id');
            $table->string('window_titel');
            $table->string('window_main');
        });
        // Insert Windows V 0.1
        DB::table('windows')->insert([
            ['window_titel' => 'Windows XP', 'window_main' => 'Windows XP'],
            ['window_titel' => 'Windows 7', 'window_main' => 'Windows 7'],
            ['window_titel' => 'Windows 8', 'window_main' => 'Windows 8'],
            ['window_titel' => 'Windows 10', 'window_main' => 'Windows 10'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('windows');
    }
}
