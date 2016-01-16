<?php

namespace App\Repositories\Place;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $table = 'place';

    public function placeType(){
        return $this->belongsTo('App\Repositories\PlaceType\PlaceType');
    }

    public function images(){
        return $this->hasMany('App\Repositories\images\images', 'meta_id');
    }

    public function address(){
        return $this->hasOne('App\Repositories\Address\Address', 'place_id');
    }

}
