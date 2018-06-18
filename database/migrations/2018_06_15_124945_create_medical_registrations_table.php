<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_registrations', function (Blueprint $table) {
            $table->increments('medical_registration_id');
            $table->integer('service_plan_id')->unsigned();
            $table->foreign('service_plan_id')->references('service_plan_id')->on('service_plans')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('patient_first_name',20);
            $table->string('patient_last_name',20);
            $table->string('patient_email')->unique();
            $table->string('user_phone_number',10)->unique();
            $table->string('patient_residence')->nullable();
            $table->string('patient_city',30)->nullable();
            $table->string('patient_country',30)->nullable();
            $table->smallInteger('patient_age')->nullable();
            $table->enum('patient_gender', array('Male', 'Female' , 'Transgender'))->default('Male');
            $table->date('patient_dob')->nullable();
            $table->boolean('medical_registration_is_active')->default(1);
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
        Schema::dropIfExists('medical_registrations');
    }
}
