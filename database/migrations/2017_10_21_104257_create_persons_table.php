<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->date('birth_date');
            $table->text('military_statue');
            $table->text('social_statue');
            $table->text('address');
            $table->integer('phone');
            $table->integer('mobile');
            $table->integer('replace_mobile');
            $table->boolean('sex');
            $table->boolean('is_employee');
            $table->boolean('is_tester');
            $table->boolean('is_applicant');
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
        Schema::dropIfExists('persons');
    }
}
