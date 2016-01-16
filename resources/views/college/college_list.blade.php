@foreach($colleges as $college)
		<div class="col-desc">
		<form method="post" action="{{url('/college/edit')}}" id="modalForm">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="_method" value="POST">
                            <h3><button type="button" class="btn btn-link collegeModal" data-toggle="modal" data-target="#myModal" data-id="{{$college['id']}}" >{{$college['name']}}</button></h3>
                            </form>

           <p>Address: {{$college['shortadd']}}</p>
           <div>
@endforeach
