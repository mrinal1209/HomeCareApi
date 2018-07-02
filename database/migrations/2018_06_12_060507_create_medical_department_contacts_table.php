<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalDepartmentContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_department_contacts', function (Blueprint $table) {
            $table->increments('med_dep_contact_id');
            $table->integer('hospital_department_id')->unsigned();
            $table->foreign('hospital_department_id')->references('hospital_department_id')->on('hospital_departments')->onDelete('cascade');
            $table->string('med_dep_contact_first_name' , 20);
            $table->string('med_dep_contact_last_name' , 20);
            $table->string('med_dep_contact_phone',10)->unique();
            $table->string('med_dep_contact_email' )->unique();
            $table->string('med_dep_contact_password',20);
            $table->string('med_dep_contact_api_token')->unique()->nullable();
            $table->text('med_dep_contact_profile_picture')->nullable();
            $table->string('med_dep_contact_residence')->nullable();
            $table->string('med_dep_contact_city',30)->nullable();
            $table->string('med_dep_contact_country',30)->nullable();
            $table->boolean('med_dep_contact_is_active')->default(1);
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
        Schema::dropIfExists('medical_department_contacts');
    }
}
