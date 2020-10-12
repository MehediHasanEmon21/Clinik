<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id');
            $table->integer('patient_id');
            $table->double('paid_amount')->nullable();
            $table->double('due_amount')->nullble();
            $table->double('discount_amount')->default(0);
            $table->double('total_after_discount_amount')->default(0);
            $table->string('special_discount_type')->nullable();
            $table->double('special_discount')->default(0);
            $table->double('special_discount_amount')->default(0);
            $table->double('total_after_special_discount')->default(0);
            $table->double('tax')->default(0);
            $table->double('tax_amount')->default(0);
            $table->double('total_after_tax')->default(0);
            $table->double('total_amount');
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
        Schema::dropIfExists('payments');
    }
}
