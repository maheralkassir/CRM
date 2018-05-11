<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->date('job_start_date');
            $table->date('employment_date');
            $table->date('contract_end_date');
            $table->integer('contract_duration');
            $table->integer('start_salary');
            $table->integer('hours_per_day');
            $table->integer('absent_total');
            $table->integer('salary_add_year');
            $table->integer('salary_project_percent');
            $table->timestamps();

            //we convert person_id to applicant id
            //we convert job start date to contract start date
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
