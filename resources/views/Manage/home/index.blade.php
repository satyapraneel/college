@extends('app')
@section('content')
    <nav class="navbar navbar-default header">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse mt20" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right ">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- nav bar wrapper ends -->
    <div class="container college-desc">
        <div class="row">
            <div class="col-md-12">

                <form method="GET" action="<?php echo url('college');?>" id="college">
                    <div class="col-md-6 check .mt20" id="checkboxForSector">
                        <span><label>Government colleges</label><input class="chkbox" type="checkbox" name="sector[government]" id="government" class="sector"/></span>
                        <span><label>Private colleges</label><input class="chkbox" type="checkbox" name="sector[private]" class="sector" id="private"/></span>
                    </div>
                    <div class="col-md-6 collge-list">
                    <select id="lstFruits" multiple="multiple" name="cityValues[]">
                        @foreach($addresses as $address)
                            <option value="{{$address['id']}}">{{$address['name']}}</option>
                        @endforeach
                    </select>
                </div>
                </form>
                <div class="col-md-12 " id="colDetails">
                    <div class="col-desc-wrapper">
                        @foreach($colleges as $college)
                            <div class="col-desc">
                                <h3>{{$college['name']}}</h3>

                                <p>{{$college['detail']}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection