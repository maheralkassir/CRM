<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
      'start_date','end_date','salary','applicant_id'
    ];

    protected $dates  = [
'     start_date','end_date'
    ];
}
