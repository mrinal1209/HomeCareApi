<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_reservations', function (Blueprint $table) {
            $table->increments('case_reservation_id');
            $table->integer('medical_registration_id')->unsigned();
            $table->foreign('medical_registration_id')->references('medical_registration_id')->on('medical_registrations')->onDelete('cascade');
            $table->integer('med_dep_contact_id')->unsigned();
            $table->foreign('med_dep_contact_id')->references('med_dep_contact_id')->on('medical_department_contacts')->onDelete('cascade');
            $table->nullableTimestamps();
            $table->enum('case_reservation_status', array('Pending', 'Confirmed'))->default('Pending');
            $table->boolean('case_reservation_is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_reservations');
    }
}
