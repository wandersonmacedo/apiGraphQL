<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('minute_amount');
            $table->string('internet_amount');
            $table->float('price');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('operator_id');
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('operator_id')->references('id')->on('operator');
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
        Schema::dropIfExists('plan');
    }
}
