<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function drawings()
    {
        return $this->hasMany('App\Drawing');
    }
}
