@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Show Data</h1>
        <form action="{{ route('admin_units.destroy', $admin_unit->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin_units.edit', $admin_unit->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
    </section>
    
          <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">

            <form action="#">
                @if($admin_unit->role=="member")
                <div class="form-group">
                    <label for="nome">No.Member</label>
                    <p class="form-control-static">{{$admin_unit->no_member}}</p>
                </div>
                @endif
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$admin_unit->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_card">ID CARD</label>
                     <p class="form-control-static">{{$admin_unit->id_card}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$admin_unit->email}}</p>
                </div>
                    <div class="form-group">
                     <label for="hp">HP</label>
                     <p class="form-control-static">{{$admin_unit->hp}}</p>
                </div>
                    <div class="form-group">
                     <label for="jalan">JALAN</label>
                     <p class="form-control-static">{{$admin_unit->jalan}}</p>
                </div>
                    <div class="form-group">
                     <label for="kota">KOTA</label>
                     <p class="form-control-static">{{$admin_unit->kota}}</p>
                </div>
                    <div class="form-group">
                     <label for="provinsi">PROVINSI</label>
                     <p class="form-control-static">{{$admin_unit->provinsi}}</p>
                </div>
                    <div class="form-group">
                     <label for="negara">NEGARA</label>
                     <p class="form-control-static">Indonesia</p>
                </div>
                    <div class="form-group">
                     <label for="kodepos">KODEPOS</label>
                     <p class="form-control-static">{{$admin_unit->kodepos}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$admin_unit->email}}</p>
                </div>
                    <div class="form-group">
                     <label for="birthdate">BIRTHDATE</label>
                     <p class="form-control-static">{{$admin_unit->birthdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="role=string">ROLE STRING</label>
                     <p class="form-control-static">{{$admin_unit->role}}</p>
                </div>
                    <div class="form-group">
                     <label for="gender">JABATAN</label>
                     <p class="form-control-static">{{$admin_unit->gender}}</p>
                </div>
                    <div class="form-group">
                     <label for="picture">PICTURE</label>
                     <img width="100" height="100" src="{{ asset($admin_unit->picture) }}" class="img-responsive"/>

                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin_units.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>

