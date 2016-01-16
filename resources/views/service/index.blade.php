<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Services</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}"/>

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/modern-business.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
    <!-- Custom Fonts -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


  <!-- Navigation -->
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
                <a class="navbar-brand" href="{{url('/')}}">LOGO</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                       <li><a href="{{url('/about')}}">About Us</a></li>
                    </li>
                    <li>
                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                    </li>
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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Services
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="http://placehold.it/1200x300" alt="">
            </div>
        </div>
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">E-Services</h2>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-cog fa-spin fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Computer Service</h4>
                        <p>For Servives Contact below </p>
                     <!--   <a href="#" class="btn btn-primary">Learn More</a>  -->
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-pencil-square-o fa-spin fa-inverse"></i>    
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Free Lancing</h4>
                        <p>For Servives Contact below </p>
                        <!--   <a href="#" class="btn btn-primary">Learn More</a>  -->
                    </div>
                </div>
            </div>
            
            <!--
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Service Three</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Service Four</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            -->
        </div>

        <!-- Service Tabs -->
        <div class="row">
          <div class="col-lg-12">
                 <h2 class="page-header">Contact Details</h2>
          </div>
          <div class="container">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Computer Service</a></li>
                <li><a data-toggle="tab" href="#menu1">Free Lancing</a></li>
              </ul>
          </div>
          <div class="container">
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
            
              <h3>Computer Service</h3>
              <p>Name:<br/>
                 Email-id:<br/>
                 Details:
              </p><br/>
            </div>
            <div id="menu1" class="tab-pane fade">
              <h3>Free Lancing</h3>
              <p>Name:<br/>
                 Email-id:<br/>
                 Details:
              </p><br/>
            </div>
          </div>
        </div>
        </div>

        <hr>
        <!-- Footer -->
      <div class="row"> 
                <div class="col-lg-12">
                    <p><center>Copyright &copy;  2015</center></p>
                </div>
            </div>   
           
        

    </div>
    <!-- /.container <footer>-->

    <!-- jQuery -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
