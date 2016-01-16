<?php

namespace App\Repositories\College;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $table = 'college';

    public function address()
    {
        return $this->hasMany('App\Repositories\Address\Address');
    }

    public function course(){
        return $this->hasMany('App\Repositories\Course\Course');
    }
}
