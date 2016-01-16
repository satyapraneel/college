<!doctype html>
<html>
    <head>
        @include('Manage.layout._header')
        @include('Manage.layout._header-script')
    </head>
    <body>
        <div class="container-fluid main-container">
            @if(!Auth::guest() && Auth::user()->role == 1)
                @include('Manage.layouts.sidebar')
            @endif
            <div class="col-md-10 content">
                @yield('content')
            </div>
        </div>
    </body>
</html>