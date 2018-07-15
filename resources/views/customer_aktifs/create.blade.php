@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Referensi Aktif / Create</h1>
  </div>
  </section>
    <!-- Main content -->
  <section class="content">
      @include('error')
      @if(Session::has('message'))
         <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
      @elseif(Session::has('message2'))
         <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
      @endif
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('customer_aktifs.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                       <label for="first_name-field">First_name</label>
                    <input type="text" id="first_name-field" name="first_name" class="form-control" value="{{ old("first_name") }}"/>
                       @if($errors->has("first_name"))
                        <span class="help-block">{{ $errors->first("first_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('middle_name')) has-error @endif">
                       <label for="middle_name-field">Middle_name</label>
                    <input type="text" id="middle_name-field" name="middle_name" class="form-control" value="{{ old("middle_name") }}"/>
                       @if($errors->has("middle_name"))
                        <span class="help-block">{{ $errors->first("middle_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_card')) has-error @endif">
                       <label for="id_card-field">Id_card</label>
                    <input type="text" id="id_card-field" name="id_card" class="form-control" value="{{ old("id_card") }}"/>
                       @if($errors->has("id_card"))
                        <span class="help-block">{{ $errors->first("id_card") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_member')) has-error @endif">
                       <label for="no_member-field">No_member</label>
                    <input type="text" id="no_member-field" name="no_member" class="form-control" value="{{ old("no_member") }}"/>
                       @if($errors->has("no_member"))
                        <span class="help-block">{{ $errors->first("no_member") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_pengajuan')) has-error @endif">
                       <label for="no_pengajuan-field">No_pengajuan</label>
                    <input type="text" id="no_pengajuan-field" name="no_pengajuan" class="form-control" value="{{ old("no_pengajuan") }}"/>
                       @if($errors->has("no_pengajuan"))
                        <span class="help-block">{{ $errors->first("no_pengajuan") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lokasi_diminati')) has-error @endif">
                       <label for="lokasi_diminati-field">Lokasi_diminati</label>
                    <input type="text" id="lokasi_diminati-field" name="lokasi_diminati" class="form-control" value="{{ old("lokasi_diminati") }}"/>
                       @if($errors->has("lokasi_diminati"))
                        <span class="help-block">{{ $errors->first("lokasi_diminati") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                       <label for="picture-field">Picture</label>
                    <input type="file" id="picture-field" name="picture" class="form-control" value="{{ old("picture") }}"/>
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('customer_aktifs.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>
