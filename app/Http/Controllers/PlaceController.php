<?php

namespace App\Http\Controllers;

use App\Repositories\Address\Address;
use App\Repositories\Address\IAddressRepository;
use App\Repositories\City\ICityRepository;
use App\Repositories\Favorites\Favorites;
use App\Repositories\Favorites\IFavoritesRepository;
use App\Repositories\Images\IImageRepository;
use App\Repositories\Images\Images;
use App\Repositories\Place\IPlaceRepository;
use App\Repositories\Place\Place;
use Illuminate\Http\Request;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class PlaceController extends Controller
{
    /**
     * @var Place
     */
    private $places;
    /**
     * @var Address
     */
    private $address;
    /**
     * @var Images
     */
    private $images;
    /**
     * @var Favorites
     */
    private $favorites;
    /**
     * @var ICityRepository
     */
    private $city;


    /**
     * @param IPlaceRepository $places
     * @param IAddressRepository $address
     * @param IImageRepository $images
     * @param IFavoritesRepository $favorites
     * @param ICityRepository $city
     */
    function __construct(
        IPlaceRepository $places,
        IAddressRepository $address,
        IImageRepository $images,
        IFavoritesRepository $favorites,
        ICityRepository $city){

        $this->places = $places;
        $this->address = $address;
        $this->images = $images;
        $this->favorites = $favorites;
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $placeType
     * @return \Illuminate\Http\Response
     */
    public function show($placeType)
    {
        //
       $places = $this->places->getPlacesByType($placeType);
       $address = $this->places->getPlaceAddress($placeType);
       $cities = $this->city->getAllCity();
        return view('place.index')
            ->with('places',$places)
            ->with('address', $address ? json_encode($address, true): '')
            ->with('cities',$cities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPlace(){

        $id = Input::get('placeId');
        $place = $this->places->getPlaceById($id);
        return response()->json(
            [
                'placeId'      => $place->id,
                'placeName'    => $place->name,
                'placeDetail'  => $place->detail,
                'placeSource'  => $place->address->source,
                'placeLat'  => !empty($place->address) ? $place->address->lat : '',
                'placeLang' => !empty($place->address) ? $place->address->lang : '',
                'placeStreet2' => $place->street2,
                'placeCity'    => $place->city,
                'placeStreet1'   => $place->street1,
                'placePinCode' => $place->pincode,
                'placeImages' => !empty($place->images) ? $place->images : ''
            ]
        );
    }

    public function showPlaceList(){
        $cities = Input::get('cityValues');
        $placeType = Input::get('place_type');
        $places = $this->places->getPlaceByCity($cities,$placeType);
        $address = $this->address->getPlaceAddress($cities);
        return view('place.placeList')
            ->with('places',$places)
            ->with('address', $address ? json_encode($address, true): '');
    }
}
