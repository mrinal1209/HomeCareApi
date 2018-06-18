<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_services', function (Blueprint $table) {
            $table->increments('medical_service_id');
            $table->string('medical_service_name');
            $table->integer('hospital_department_id')->unsigned();
            $table->foreign('hospital_department_id')->references('hospital_department_id')->on('hospital_departments')->onDelete('cascade');
            $table->boolean('medical_service_is_active')->default(1);
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
        Schema::dropIfExists('medical_services');
    }
}
