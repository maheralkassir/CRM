<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpPosition extends Model
{
    protected $fillable = [
      'department','start_date','employee_id'
    ];

    protected $dates = [
      'start_date'
    ];

    protected $table = 'emppositions';

}
