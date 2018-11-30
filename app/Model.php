<?php

namespace App;

use Illuminate\Database\Eloquent\Model as origin_model;

class Model extends origin_model
{
    //
    protected $guarded = ['id'];

}
