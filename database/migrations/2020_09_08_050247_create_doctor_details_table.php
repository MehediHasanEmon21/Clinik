<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('user_id = doctor_id');
            $table->string('designation')->nullable();
            $table->string('degree')->nullable();
            $table->string('department')->nullable();
            $table->string('specialist')->nullable();
            $table->text('experience')->nullable();
            $table->string('service_place')->nullable();
            $table->string('blood_group')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('doctor_details');
    }
}
