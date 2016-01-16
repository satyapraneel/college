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
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
          rel="stylesheet" type="text/css"/>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- nav bar wrapper starts -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    @if(Auth::guest())
                        <a href="{{url('/auth/login')}}">Login/Register</a>
                    @else
                        <a href="{{url('/auth/logout')}}">Logout</a>
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

<div class="container college-desc">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <form method="post" action="{{url('/college')}}" id="college">
                <div class="col-md-6 check .mt20" id="checkboxForSector">
                    <span><label>Government</label><input class="sector"  type="checkbox" name="sector[government]" /></span>
                    <span><label>Private </label><input class="sector"  type="checkbox" name="sector[private]" /></span>
                </div>
                <div class="col-md-6 college-list">
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
            <div class="col-md-6">
                <div class="col-desc-wrapper" id="colDetails">
                    @foreach($colleges as $college)
                        <div class="col-desc">
                            <form method="post" action="{{url('/college/edit')}}" id="modalForm">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="_method" value="POST">
                            <h3><button type="button" class="btn btn-link collegeModal" data-toggle="modal" data-target="#myModal" data-id="{{$college->id}}">{{$college->name}}</button></h3>
                            </form>
                           <!-- <p>{{$college->detail}}</p> -->
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
        <span data-base-url="{{url('/')}}" id="baseUrl" class="hidden">
        </span>
    </div>
</div>
@include('college.college_modal')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/filter.js')}}"></script>
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#lstFruits').multiselect();
        Filter.init();
    });
</script>
</body>
</html>
