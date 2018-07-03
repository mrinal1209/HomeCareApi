<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseReservationAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_reservation_addons', function (Blueprint $table) {
            $table->increments('reservation_addon_id');
            $table->integer('case_reservation_id')->unsigned();
            $table->foreign('case_reservation_id')->references('case_reservation_id')->on('case_reservations')->onDelete('cascade');
            $table->string('case_instructions')->nullable();
            $table->text('case_documents')->nullable();
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
        Schema::dropIfExists('case_reservation_addons');
    }
}
