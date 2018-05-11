<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
      'last_salary','person_id','time_to_get_work','cv_link','interview_date','job','confident_people','numeric_evalution','technical_rate'
    ];
    protected $dates = [
      'time_to_get_work','interview_date'
    ];
}
