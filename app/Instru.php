<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instru extends Model
{
    protected $table = "instruments";
    protected $fillable = ['studyname' , 'instrumentname'];
}
