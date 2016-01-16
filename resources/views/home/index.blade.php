@extends('master')
@section('content')
 @include('layout._navigation')
    @include('home.slider')
    <div class="container">
        @include('home.business') 
        @include('home.portfolio')
      <!--  include('home.modern') -->
        @include('layout._footer-main')
    </div>
@endsection