@extends('app')

@section('content')
    @if(Session::has('message'))
        <div class="col-sm-12">
            <div class="col-sm-6">
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            </div>
        </div>
    @endif
    <h1>Testimonial</h1>
    <form method="POST" action="<?php echo url('manageCollege');?>" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="name" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="text" name="company_name" id="company_name" placeholder="company name" class="form-control"/>
        </div>
        <div class="form-group">
            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-default"/>
        </div>
    </form>
@endsection