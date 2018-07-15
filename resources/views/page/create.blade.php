@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Master Data / Create</h1>
    </div>
    </section>
      <!-- Main content -->
    <section class="content">
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('master_datas.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('imei')) has-error @endif">
                       <label for="imei-field">Imei</label>
                    <input type="text" id="imei-field" name="imei" class="form-control" value="{{ old("imei") }}"/>
                       @if($errors->has("imei"))
                        <span class="help-block">{{ $errors->first("imei") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('ip')) has-error @endif">
                       <label for="ip-field">IP</label>
                    <input type="text" id="ip-field" name="ip" class="form-control" value="{{ old("ip") }}"/>
                       @if($errors->has("ip"))
                        <span class="help-block">{{ $errors->first("ip") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('click')) has-error @endif">
                       <label for="click-field">Click</label>
                    <input type="text" id="click-field" name="click" class="form-control" value="{{ old("click") }}"/>
                       @if($errors->has("click"))
                        <span class="help-block">{{ $errors->first("click") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('view')) has-error @endif">
                       <label for="view-field">View</label>
                    <input type="text" id="view-field" name="view" class="form-control" value="{{ old("view") }}"/>
                       @if($errors->has("view"))
                        <span class="help-block">{{ $errors->first("view") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('type_device')) has-error @endif">
                       <label for="type_device-field">Type_device</label>
                    <input type="text" id="type_device-field" name="type_device" class="form-control" value="{{ old("type_device") }}"/>
                       @if($errors->has("type_device"))
                        <span class="help-block">{{ $errors->first("type_device") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_aplikasi')) has-error @endif">
                       <label for="id_aplikasi-field">Id Aplikasi</label>
                    <input type="text" id="id_aplikasi-field" name="id_aplikasi" class="form-control" value="{{ old("id_aplikasi") }}"/>
                       @if($errors->has("id_aplikasi"))
                        <span class="help-block">{{ $errors->first("id_aplikasi") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('user')) has-error @endif">
                       <label for="user-field">User</label>
                    <input type="text" id="user-field" name="user" class="form-control" value="{{ old("user") }}"/>
                       @if($errors->has("user"))
                        <span class="help-block">{{ $errors->first("user") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('master_datas.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
