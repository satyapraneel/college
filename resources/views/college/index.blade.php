<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/header_logo.css')}}">
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
</head>
<body style="background-color:#E0E0E0">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- nav bar wrapper starts -->
<nav class="navbar navbar-inverse navbar-fixed-top header-nav" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="../img/logo.png" class="img-responsive"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    @if(Auth::guest())
                        <a href="{{url('/auth/login')}}">Login/Register</a>
                    @else
                        <a href="{{url('/auth/logout')}}">Logout</a>{{Auth::user()->name}}
                    @endif
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- nav bar wrapper ends -->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container college-desc" style="background-color:#FFFFFF">
    <div class="row">
      <div class="col-md-8">
              <div class="row">
        <div class="col-md-12">
            <div class="row">
                <form method="post" action="{{url('/college')}}" id="college">
                <div class="col-md-6 check .mt20" id="checkboxForSector">
                    <span><p style="font-size:22px;"><u><b>Select Type of College</b></u></p></span>
                    <div class="col-md-12 text-left mt20">
                        <input class="sector"  type="checkbox" name="sector[government]" /><label style="font-size:18px;">Government</label><br/>
                        <input class="sector"  type="checkbox" name="sector[private]" /><label style="font-size:18px;">Private </label> 
                    </div>
                </div>
                <div class="col-md-6 college-list">
                 <span><p style="font-size:22px;"><u><b>Select City</b></u></p></span>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="POST">
                        <select id="lstFruits" multiple="multiple" name="cityValues[]">
                            @foreach($address as $add)
                                <option value="{{$add}}">{{$add}}</option>
                            @endforeach
                        </select>
         
                       <input type="hidden" value="{{$colleges[0]->course}}" name="course">
                </div>
                </form>
            </div>
            <div class="col-md-6 listofColleges">
            <div class="col-md-12">
                <h3>List of Colleges</h3>
            </div>
                <div class="col-desc-wrapper" id="colDetails">
                    @foreach($colleges as $college)
                        <div class="col-desc">
                            <form method="post" action="{{url('/college/edit')}}" id="modalForm">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="_method" value="POST">
                            <h3><button type="button" class="btn btn-link collegeModal" data-toggle="modal" data-target="#myModal" data-id="{{$college->id}}">{{$college->name}}</button></h3>
                            </form>
                            <p>Address: {{$college->shortadd}}</p>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
        <span data-base-url="{{url('/')}}" id="baseUrl" class="hidden">
        </span>
    </div>
      </div>

      <div class="col-md-1"></div>

      <div class="col-md-3" >
          <form method="get" action="{{url('/favourite')}}" id="favourite-hidden">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" name="_method" value="GET">
          </form>
            
            <div class="col-desc-wrapper_1">
                <h4>FAVIOURTES</h4>
                  <div class="row">
                      <div class="col-md-12" id="favourite-list" ></div>
                  </div>
            </div>
      </div>
    </div>
</div>





@include('college.college_modal')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/filter.js')}}"></script>
<script src="{{ URL::asset('js/favourites.js')}}"></script>
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#lstFruits').multiselect();
        Filter.init();
        Favourites.init();
    });
</script>


</body>
</html>