<div class="col-sm-5">
    
    <div class="form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Sign up now</h3>
                <p>Fill in the form below to get instant access:</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-pencil"></i>
            </div>
        </div>
        <div class="form-bottom">
            <form class="registration-form" role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="sr-only" for="form-first-name">Name</label>
                    <input type="text" name="name" required placeholder="Name..." class="form-name form-control" id="form-name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">E-Mail Address</label>
                    <input type="email" name="email" required value="{{ old('email') }}"  placeholder="Email Address..." class="form-name form-control" id="form-email">
                </div>
                <div class="form-group">
                    <label class="sr-only">Password</label>
                        <input type="password" class="form-control" required name="password" placeholder="Password...">
                </div>
                <div class="form-group">
                    <label class="sr-only">Confirm Password</label>
                    <input type="password" class="form-control" required name="password_confirmation" placeholder="Confirm password...">
                </div>
                <button type="submit" class="btn">Sign me up!</button>
            </form>
        </div>
    </div>

</div>
