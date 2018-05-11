<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('person_id');
            $table->integer('salary');
            $table->integer('salary_project_percent');
            $table->date('start_date');
            $table->date('end_date');

            //we convert person id to applicant id in other migration
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testers');
    }
}
