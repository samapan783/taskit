<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicant_id')->nullable();
            $table->string('applicant');
            $table->string('father_name');
            $table->string('mother_name');
            $table->mediumText('address');
            $table->string('pin');
            $table->string('category');
            $table->string('nationality');
            $table->string('religion');
            $table->string('dob');
            $table->string('telephone');
            $table->string('email');
            $table->string('sex');
            $table->string('e_book_medium');
            $table->string('mobile');
            $table->string('image_name');
            $table->string('sign_name');
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
        Schema::dropIfExists('registrations');
    }
}
