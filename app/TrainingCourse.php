<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    protected $fillable = [
      'notes','course_name','start_date','end_date','employee_id'
    ];

    protected $table = "trainingcourses";
}
