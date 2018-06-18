<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_plans', function (Blueprint $table) {
            $table->increments('service_plan_id');
            $table->string('service_plan_name');
            $table->double('service_plan_price', 8, 2);
            $table->text('service_plan_services')->nullable();
            $table->integer('medical_service_id')->unsigned();
            $table->foreign('medical_service_id')->references('medical_service_id')->on('medical_services')->onDelete('cascade');
            $table->boolean('service_plan_is_active')->default(1);
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
        Schema::dropIfExists('service_plans');
    }
}
