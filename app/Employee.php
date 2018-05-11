<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'applicant_id',
      'contract_start_date',
      'employment_date',
      'contract_end_date',
      'contract_duration',
      'start_salary',
      'hours_per_day',
      'absent_total',
      'salary_add_year',
      'salary_project_percent'
    ];


    protected $dates = [
      'contract_start_date',
      'employment_date',
      'contract_end_date',
    ];
}
