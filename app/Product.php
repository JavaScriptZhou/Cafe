<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;
class Product extends Model
{
    //


    //该属性值名称是否产品已有的属性名
    public  function hasProp_value($prop_value_id)
    {
        return (bool) strstr($this->prop_values,(string)$prop_value_id);
    }
}
