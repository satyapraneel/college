
    @foreach($collegesOfCities as $college)
            <div class="col-desc">
                <h3>{{$college['name']}}</h3>
                <p>{{$college['detail']}}</p>
            </div>
    @endforeach
