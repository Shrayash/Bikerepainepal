<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Speciality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     // Schema::create('speciality', function (Blueprint $table) {
    //     //     $table->bigIncrements('id');
    //     //     $table->string('speciality');
    //     // });
    //     // Schema::create('group', function (Blueprint $table) {
    //     //     $table->bigIncrements('id');
    //     //     $table->string('group');
    //     // });
    //     // Schema::create('department', function (Blueprint $table) {
    //     //     $table->bigIncrements('id');
    //     //     $table->string('department');
    //     // });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speciality');
    }
}
