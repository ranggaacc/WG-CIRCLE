<!DOCTYPE html>
<html>
@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
    @include('error')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
    @elseif(Session::has('message2'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
    @endif
      <!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Update Image Profil</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset(Auth::user()->img) }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" role="form" method="POST" action="{{ url('/updateimgprofil') }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <input type="file" id="img" name="img" accept="image/x-png,image/gif,image/jpeg">
        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-pencil-square-o text-muted"></i> Update</button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Choose your new Image Profil with Square Dimension (e.g. 500pxx500px)
  </div>
</div>
<!-- /.center -->
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>

