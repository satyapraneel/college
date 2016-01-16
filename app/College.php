<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class College extends Model
{
    //
    protected $table = 'college';

    public function city()
    {
        return $this->belongsToMany('App\City', 'city_college', 'college_id', 'city_id');
    }

    public function getCollegeByCityId($city){
        $relations = ['city'];
        $colleges = $this->with($relations)->get();
        $temp = [];
        $i = 0;
        foreach($colleges as $college){
            foreach($college->city as $singleCity) {
                if (in_array($singleCity->id, $city)) {
                    $temp[$i]['id']     = $college['id'];
                    $temp[$i]['name']     = $college['name'];
                    $temp[$i]['detail'] = $college['detail'];
                    $temp[$i]['sector'] = $college['sector'];
                    $i++;
                }
            }
        }
        return $temp;
    }

    public function getCollegeByCityAndSector($city, $sector){
        $relations = ['city'];
        $colleges = $this->with($relations)->get();
        $temp = [];
        $i = 0;
        foreach($colleges as $college){
            if(array_key_exists($college['sector'],$sector)){
                foreach ($college->city as $singleCity) {
                    if (in_array($singleCity->id, $city)) {
                        $temp[$i]['id']     = $college['id'];
                        $temp[$i]['name']     = $college['name'];
                        $temp[$i]['detail'] = $college['detail'];
                        $temp[$i]['sector'] = $college['sector'];
                        $i++;
                    }
                }
            }
        }
        return $temp;
    }
}
