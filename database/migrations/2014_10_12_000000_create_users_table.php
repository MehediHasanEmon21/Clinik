<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('userType')->nullable()->comment('admin,doctor,patient');
            $table->string('role')->nullable()->comment('admin = head of software','user= who are get service');
            $table->tinyInteger('soft_delete')->default(0);
            $table->string('verify_token',100)->nullable();
            $table->integer('verify_code')->nullable();
            $table->tinyInteger('verify_account')->default(0);
            $table->string('slug',255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
