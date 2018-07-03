<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRegistrationAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_registration_addons', function (Blueprint $table) {
            $table->increments('registration_addon_id');
            $table->integer('medical_registration_id')->unsigned();
            $table->foreign('medical_registration_id')->references('medical_registration_id')->on('medical_registrations')->onDelete('cascade');
            $table->string('patient_instructions')->nullable();
            $table->text('patient_documents')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_registration_addons');
    }
}
