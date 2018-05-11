<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
      'name','birth_date','military_statue','social_statue','address','phone','mobile','replace_mobile','sex'
    ];
    protected $table = 'persons';

    protected $dates = [
      'created_at',
      'updated_at',
      'birth_date'
    ];

}
