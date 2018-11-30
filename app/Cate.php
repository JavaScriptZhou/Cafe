<?php

namespace App;

use App\Model;

class Cate extends Model
{
    //



    public function products()
    {

        //与产品表建立一对多正向关联
        return $this->hasMany('App\Product');
    }


}
