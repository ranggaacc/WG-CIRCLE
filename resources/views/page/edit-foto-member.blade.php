@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section section-first section-member">
    <div class="container-fluid">
      <h2 class="section__h2">Edit Foto <span class="text-accent">Member</span></h2>
      <div class="row">
        <div class="col-sm-2">
          <div class="dashboard-box">
            <div class="dashboard-box-row">
              @if(Auth::user()->picture!=null)
                <img src="{{ asset(Auth::user()->picture) }}" alt="" class="dashboard-box__img img-circle img-responsive">          
              @else
                <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="" class="dashboard-box__img img-circle img-responsive">
              @endif
            </div>
            <div class="dashboard-box-row">
              <h3 class="dashboard-box__h3 text-center">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
              <span class="text-center"></span>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>ID Member</div>
              <div class="text-secondary" style="color:blue;">{{ Auth::user()->no_member }}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Status</div>
              <div class="text-secondary" style="color:green;">@if(Auth::user()->activate) aktif @else non-aktif @endif</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Referensi</div>
              <div class="text-secondary">{{ $customers->count() + $customerspasif->count()}}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Poin</div>
              <div class="text-secondary">{{ $point }}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
            <a href="{{ url('/member-logout') }}">Logout</a>
            </div>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="dashboard-box">
              <form role="form" action="post-foto-member/{{$user->id}}" enctype="multipart/form-data" method="post"> 
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group @if($errors->has('picture')) has-error @endif">
                           <label for="picture-field">Foto</label>
                        <input type="file" id="picture-field" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)" name="picture" class="form-control" value="{{ is_null(old("picture")) ? $user->picture : old("picture") }}"/>
                           @if($errors->has("picture"))
                            <span class="help-block">{{ $errors->first("picture") }}</span>
                           @endif
                            <br>
                           <img width="100" height="100" id="avatar" src="{{ asset($user->picture) }}" class="img-responsive"/>
                      </div>
                    <div class="well well-xs">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>               
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.footer-public')
  <script>
  $(function () {
    $(".dashboard-box-table").DataTable({
        "scrollX": true
    });
  });
</script>
</body>
</html>