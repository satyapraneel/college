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
    <div class="container">
        @foreach($colleges as $testimonial)
            <div class="row">
                <div class="col-sm-4">
                    {{$testimonial->name}}
                </div>
                <div class="col-sm-3">
                    {{$testimonial->description}}
                </div>
                <div class="col-sm-1">
                    <a href="<?php echo url('manageCollege/'.$testimonial->id.'/edit');?>" class="btn-link">Edit</a>
                </div>
                <div class="col-sm-1">

                    <form method="POST" action="<?php echo url('manageCollege/'.$testimonial->id);?>">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>"/>
                        <input class="btn-link" type="submit" value="Delete"/>
                    </form>
                </div>
            </div><br/><br/>
        @endforeach
    </div>
@endsection
