<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('person_id');
            $table->integer("last_salary");
            $table->date('time_to_get_work');
            $table->text('confident_people');
            $table->text('technical_rate');
            $table->text('job');
            $table->text('cv_link');
            $table->integer('numeric_evalution');
            $table->date('interview_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
