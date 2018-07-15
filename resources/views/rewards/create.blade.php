@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Reward / Create</h1>
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

            <form action="{{ route('rewards.store') }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('id_product')) has-error @endif">
                       <label for="id_product-field">Jenis Referensi</label>
                        <select name="id_product" id="id_product" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="2">Pasif</option>
                        </select>
                       @if($errors->has("id_product"))
                        <span class="help-block">{{ $errors->first("id_product") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Segmentasi</label>
                       <select name="name" id="name" class="form-control">
                        <option value="middle-high">Middle-High</option>
                        <option value="middle-low">Middle-Low</option>
                        </select>
                       @if($errors->has("name"))
                        <span class="help-block">Pilih Segmemtasi</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('category')) has-error @endif">
                       <label for="category-field">Kategori</label>
                       <select name="category" id="category" class="form-control">
                        <option value="commision-fee">Commision Fee</option>
                        <option value="closing-fee">Closing Fee</option>
                        <option value="trip">Trip</option>
                        </select>
                       @if($errors->has("category"))
                        <span class="help-block">{{ $errors->first("category") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('type')) has-error @endif">
                       <label for="type-field">Tipe Bad Room</label>
                       <select name="type" id="type" class="form-control">
                        <option value="Studio">Studio/Superior</option>
                        <option value="1BR">1 BR/Deluxe</option>
                        <option value="2BR">2 BR/3 BR/Suiter</option>
                        </select>
                       @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('value')) has-error @endif">
                       <label for="value-field">Rupiah (Closing Fee / Commision Fee)</label>
                    <input type="number" id="value-field" name="value" class="form-control" value="{{ old("value") }}"/>
                       @if($errors->has("value"))
                        <span class="help-block">{{ $errors->first("value") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="value-field">Poin (Trip)</label>
                    <input type="number" id="value-field" name="status" class="form-control" value="{{ old("value") }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">Isi Poin</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('rewards.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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

