<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ['Nom','date','Cours'];




    public function getCoursattribute($Cours){

        return asset($Cours);
    }
}
