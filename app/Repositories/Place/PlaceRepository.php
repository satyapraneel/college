<?php
/**
 * @File PlaceRepository.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Jan-16
 */

namespace App\Repositories\Place;


class PlaceRepository implements IPlaceRepository{
    /**
     * @var Place
     */
    private $place;

    /**
     * @param Place $place
     */
    function __construct(Place $place){

        $this->place = $place;
    }


    /**
     * @param $placeType
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author Satyapraneel <satyapraneel@gmail.com>
     */
    public function getPlacesByType($placeType){
        return $this->place
            ->with(['images' => function($query)  {
                $query->where('images.image_type', '=', 'place');
            }])
            ->where('place_type_id', '=', $placeType)
            ->get();
    }

    public function getPlaceAddress($placeType){
        return $this->place
            ->join('place_type','place_type.id', '=', 'place.place_type_id')
            ->join('address','address.place_id', '=', 'place.id')
            ->get(['address.street1','address.street2','address.lat','address.lang', 'place.id']);
    }

    public function getPlaceById($placeId){
        return $this->place
            ->with('address','images')
            ->where('place.id', '=', $placeId)->first();
    }

    public function getPlaceByCity($citiesId, $placeType){
        $placeList = $this->place
            ->join('address','address.place_id', '=', 'place.id');
            if(!empty($citiesId)) {
                $placeList->whereIn('address.city_id', $citiesId);
            }
             $placeList->where('place.place_type_id', '=', $placeType);
        return $placeList->get(['place.*']);
    }

}