<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;
class Prop_name extends Model
{
    //

    public function  prop_values()
    {
        //与 prop_values 一对多的正向关联
        return $this->hasMany('App\Prop_value');
    }
}
