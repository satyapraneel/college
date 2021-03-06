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
             <a class="navbar-brand" href="{{url('/')}}"><img src="{{ URL::asset('img/logo.png')}}" alt="logo" class="img-responsive"> </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         
            <ul class="nav navbar-nav navbar-right navRight">
                <li><a href="{{url('/about')}}">About Us</a></li>
                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                <li>
                    @if(Auth::guest())
                        <a href="{{url('/auth/login')}}">Login/Register</a>
                    @else
                        <a href="{{url('/auth/logout')}}">Logout</a>
                        Hi ,{{Auth::user()->name}}

                    @endif
                </li>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
