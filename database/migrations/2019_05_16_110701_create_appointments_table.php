<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mrn');
            $table->integer('department_id')->unsigned();
            $table->integer('room');
            $table->string('date')->unique();
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('created_by')->references('id')->on('staff');
            $table->foreign('mrn')->references('mrn')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
