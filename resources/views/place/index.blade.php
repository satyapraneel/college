@extends('app')
@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <h3>Places</h3>
    <span data-base-url="{{url('/')}}" id="baseUrl" class="hidden">
        </span>
    <div class="container">
        <div class="row">
            <form method="post" action="{{url('/place/showPlaceList')}}" id="citySelect">
                <div class="col-md-6 col-md-offset-6">
                    <span><p style="font-size:22px;"><u><b>Select City</b></u></p></span>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="_method" value="POST">
                    <select id="lstCities" multiple="multiple" name="cityValues[]">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{$places[0]->place_type_id}}" name="place_type"/>
                </div>
            </form>
        </div>
        <hr/>
        <h1>List of places</h1>
        <div class="row" id="placeDetails">
            <div class="col-md-6">
                @foreach($places as $place)
                    <form method="post" action="{{url('/place/showPlace')}}" id="modalPlaceForm">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="POST">
                        <button type="button" class="btn-link placeModal" data-toggle="modal" data-target="#myModal" data-id="{{$place->id}}">{{$place->name}}</button>
                    </form>
                @endforeach
                <span id="mapLocation" class="hidden">{{$address}}</span>
            </div>
            <div class="col-md-6">
                <div id="map" style="width: 500px; height: 400px;"></div>
            </div>
        </div>
        @include('place/place_modal')
    </div>
@endsection