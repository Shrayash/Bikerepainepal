<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookCustomerVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_customer_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_customer_id');
            $table->foreign('book_customer_id')->references('id')->on('book_customer')->onDelete('cascade');
            $table->string('book_v_no');
            $table->string('book_date');
            $table->string('book_delivery');
            $table->string('book_v_remarks');
            $table->string('book_v_status')->default('active');
            $table->string('book_work_status')->default('resolve');
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
        Schema::dropIfExists('book_customer_vehicles');
    }
}
