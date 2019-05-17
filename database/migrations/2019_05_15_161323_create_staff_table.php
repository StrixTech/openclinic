<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_id')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('department')->unsigned();
            $table->integer('monthly_pay');
            $table->integer('role')->unsigned();
            $table->timestamps();

            $table->foreign('role')->references('id')->on('roles');
            $table->foreign('department')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
