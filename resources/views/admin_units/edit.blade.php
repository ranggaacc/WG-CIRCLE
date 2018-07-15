@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Admin Unit / Create</h1>
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

            <form action="{{ route('admin_units.update', $admin_unit->id) }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field"><h3>Credential</h3></label>
                </div>

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Nama</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $admin_unit->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $admin_unit->email : old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                       <label for="password-field">Password</label>
                    <input type="password" id="password-field" name="password" class="form-control" value="{{ is_null(old("password")) ? $admin_unit->password : old("password") }}"/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field"><h3>Profil Admin Unit</h3></label>
                    </div>

                    <div class="form-group @if($errors->has('id_card')) has-error @endif">
                       <label for="id_card-field">No Induk Pegawai (NIP)</label>
                    <input type="text" id="id_card-field" name="id_card" class="form-control" value="{{ is_null(old("id_card")) ? $admin_unit->id_card : old("id_card") }}"/>
                       @if($errors->has("id_card"))
                        <span class="help-block">{{ $errors->first("id_card") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Tanggal Lahir</label>
                    <input type="date" id="birthdate-field" name="birthdate" class="form-control date-picker" value="{{ is_null(old("birthdate")) ? $admin_unit->birthdate : old("birthdate") }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_product')) has-error @endif">
                       <label for="negara-field">Pilihan Lokasi diminati</label>
                        <select name="id_product" id="id_product" class="form-control">
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                        </select>
                       @if($errors->has("id_product"))
                        <span class="help-block">{{ $errors->first("id_product") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('hp')) has-error @endif">
                       <label for="hp-field">Hp</label>
                    <input type="text" id="hp-field" name="hp" class="form-control" value="{{ is_null(old("hp")) ? $admin_unit->hp : old("hp") }}"/>
                       @if($errors->has("hp"))
                        <span class="help-block">{{ $errors->first("hp") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('jalan')) has-error @endif">
                       <label for="jalan-field">Jalan</label>
                    <input type="text" id="jalan-field" name="jalan" class="form-control" value="{{ is_null(old("jalan")) ? $admin_unit->jalan : old("jalan") }}"/>
                       @if($errors->has("jalan"))
                        <span class="help-block">{{ $errors->first("jalan") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kota')) has-error @endif">
                       <label for="kota-field">Kota</label>
                    <input type="text" id="kota-field" name="kota" class="form-control" value="{{ is_null(old("kota")) ? $admin_unit->kota : old("kota") }}"/>
                       @if($errors->has("kota"))
                        <span class="help-block">{{ $errors->first("kota") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('provinsi')) has-error @endif">
                       <label for="provinsi-field">Provinsi</label>
                    <input type="text" id="provinsi-field" name="provinsi" class="form-control" value="{{ is_null(old("provinsi")) ? $admin_unit->provinsi : old("provinsi") }}"/>
                       @if($errors->has("provinsi"))
                        <span class="help-block">{{ $errors->first("provinsi") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_product')) has-error @endif">
                       <label for="negara-field">Pilihan Lokasi diminati</label>
                       <select name="id_product" id="id_product" class="form-control">
                       @foreach($products as $p)
                           <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                        </select>
                       @if($errors->has("id_product"))
                        <span class="help-block">{{ $errors->first("id_product") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kodepos')) has-error @endif">
                       <label for="kodepos-field">Kodepos</label>
                    <input type="text" id="kodepos-field" name="kodepos" class="form-control" value="{{ is_null(old("kodepos")) ? $admin_unit->kodepos : old("kodepos") }}"/>
                       @if($errors->has("kodepos"))
                        <span class="help-block">{{ $errors->first("kodepos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Jabatan</label>
                    <input type="text" id="gender-field" name="gender" class="form-control" value="{{ is_null(old("gender")) ? $admin_unit->gender : old("gender") }}"/>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                       <label for="picture-field">Picture</label>
                    <input type="file" id="picture-field" name="picture" class="form-control" value="{{ is_null(old("picture")) ? $admin_unit->picture : old("picture") }}"/>
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin_units.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </section>
        <!-- /.content -->
      </div>
    @include('layouts.footer') 
    <script>
  $(function () {
    document.getElementById("birthdate-field").valueAsDate = new Date();
    });
    </script>
    </body>
    </html>
    
    