<?php

use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Department extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            Department V 0.1
        */
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('department_id');
            $table->string('department_titel');
            $table->string('department_main');
        });
        // Insert Department V 0.1
        DB::table('departments')->insert([
            ['department_titel' => 'IT', 'department_main' => 'Information Technology'],
            ['department_titel' => 'AC', 'department_main' => 'Accounting'],
            ['department_titel' => 'FN', 'department_main' => 'Fitness'],
            ['department_titel' => 'EN', 'department_main' => 'Engineering'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
