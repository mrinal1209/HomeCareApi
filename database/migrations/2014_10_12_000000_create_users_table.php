<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('user_id');
            $table->string('user_first_name',20);
            $table->string('user_last_name',20);
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_api_token')->unique()->nullable();
            $table->string('user_phone_number',10)->unique();
            $table->text('user_profile_picture')->nullable();
            $table->string('user_residence')->nullable();
            $table->string('user_city',30)->nullable();
            $table->string('user_country',30)->nullable();
            $table->boolean('user_is_active')->default(1);
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
