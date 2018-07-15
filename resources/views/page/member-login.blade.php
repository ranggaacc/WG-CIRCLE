@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section section-first section-member">

    <div class="container">
      <h2 class="section__h2">Member <span class="text-accent">Login</span></h2>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form class="login-form" role="form" method="POST" action="{{ url('/member-post-login') }}" >
          {{ csrf_field() }}
          <meta name="csrf-token" content="{{ csrf_token() }}">

          @include('error')
          @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
          @elseif(Session::has('message2'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
          @endif

            <div class="form-group row">
              <label for="first-name" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" placeholder="Email"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="first-name" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" placeholder="Password WG Circle"/>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary form__btn login-form__btn" value="Login"/>
                <span> Have not any account member? <a href="{{ url('/registration')}}">Registration</a></span>
                <span class="pull-right"><a href="{{ url('/password/reset') }}">Forgot Your Password?</a></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>