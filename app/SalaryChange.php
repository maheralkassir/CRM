<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryChange extends Model
{
    protected $fillable = [
      'employee_id','salary','date','department','details'
    ];

    protected $table = "SalaryChanges";
}
