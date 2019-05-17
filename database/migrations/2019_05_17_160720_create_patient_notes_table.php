<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mrn');
            $table->longText('note');
            $table->string('created_by');
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('created_by')->references('staff_id')->on('staff');
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
        Schema::dropIfExists('patient_notes');
    }
}
