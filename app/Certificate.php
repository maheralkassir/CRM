<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
      'person_id','image','certificate_date','name'
    ];

    protected $dates = [
      'certificate_date'
    ];
}
