<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = "study";
    protected $fillable = ['username' , 'studyname' , 'stringaccess'];
}
