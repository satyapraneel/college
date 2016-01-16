<?php

namespace App\Repositories\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected  $table = 'city';

    public function state(){
        return $this->belongsTo('App\Repositories\State\state');
    }
}
