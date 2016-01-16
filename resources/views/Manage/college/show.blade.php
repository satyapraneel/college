@extends('app')

@section('content')
    @if(Session::has('message'))
        <div class="col-sm-12">
            <div class="col-sm-6">
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            </div>
        </div>
    @endif
    <h1>Testimonials</h1>
    <form method="POST" action="<?php echo url('manageCollege/'.$college->id);?>" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="name" class="form-control" value="{{$college->name}}"/>
        </div>
        <div class="form-group">
            <input type="text" name="company_name" id="company_name" placeholder="company name" class="form-control" value="{{$college->company_name}}"/>
        </div>
        <div class="form-group">
            <textarea name="description" id="description" placeholder="Description" class="form-control">{{$college->description}}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-default"/>
        </div>
    </form>
@endsection