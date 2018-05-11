<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    protected $fillable = [
      'start_date','end_date','salary','salary_project_percent','applicant_id'
    ];

    protected $dates = [
      'start_date','end_date'
    ];
}
