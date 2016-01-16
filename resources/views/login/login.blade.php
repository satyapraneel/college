<div class="col-sm-5">
    
    <div class="form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Login to our site</h3>
                <p>Enter username and password to log on:</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-key"></i>
            </div>
        </div>
        <div class="form-bottom">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" class="login-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="sr-only" for="form-username">E-Mail Address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" class="form-username form-control" id="form-username">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-password">Password</label>
                    <input type="password" class="form-control form-password" name="password"  placeholder="Password..." id="form-password"/>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">Sign in!</button>
                <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
            </form>
        </div>
    </div>

    <div class="social-login">
        <h3>...or login with:</h3>
        <div class="social-login-buttons">
            <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                <i class="fa fa-facebook"></i> Facebook
            </a>
            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                <i class="fa fa-twitter"></i> Twitter
            </a>
            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                <i class="fa fa-google-plus"></i> Google Plus
            </a>
        </div>
    </div>
</div>
