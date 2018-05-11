<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastJob extends Model
{
    protected $fillable = [
      'work_type','company_name','applicant_id'
    ];
    protected $table = 'lastjobs';

}
