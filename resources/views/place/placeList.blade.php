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