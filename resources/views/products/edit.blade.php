@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Info Product / Create</h1>
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

            <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('kode')) has-error @endif">
                       <label for="kode-field">Code</label>
                    <input type="text" id="kode-field" name="kode" class="form-control" value="{{ is_null(old("kode")) ? $product->kode : old("kode") }}"/>
                       @if($errors->has("kode"))
                        <span class="help-block">{{ $errors->first("kode") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $product->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ is_null(old("description")) ? $product->description : old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('segmentasi')) has-error @endif">
                       <label for="jenis-field">Segmentasi</label>
                        <select name="segmentasi" id="segmentasi" class="form-control">
                        <option value="middle-high">Middle-High</option>
                        <option value="middle">Middle</option>
                        </select>
                       @if($errors->has("segmentasi"))
                        <span class="help-block">{{ $errors->first("segmentasi") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('jenis')) has-error @endif">
                       <label for="jenis-field">Type</label>
                       <select name="jenis" id="jenis" class="form-control">
                       <option value="apartment">Apartment</option>
                       <option value="condotel">Condotel</option>
                       <option value="commercial">Commercial</option>
                       <option value="office">Office</option>
                       </select>
                      @if($errors->has("jenis"))
                        <span class="help-block">{{ $errors->first("jenis") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('price_list')) has-error @endif">
                       <label for="price_list-field">Price list</label>
                    <input type="file" id="price_list-field" name="price_list" class="form-control" value="{{ is_null(old("price_list")) ? $product->price_list : old("price_list") }}"/>
                       @if($errors->has("price_list"))
                        <span class="help-block">{{ $errors->first("price_list") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('progress')) has-error @endif">
                       <label for="progress-field">Progress</label>
                    <input type="text" id="progress-field" name="progress" class="form-control" value="{{ is_null(old("progress")) ? $product->progress : old("progress") }}"/>
                       @if($errors->has("progress"))
                        <span class="help-block">{{ $errors->first("progress") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('website')) has-error @endif">
                    <label for="website-field">Website</label>
                 <input type="text" id="website-field" name="website" class="form-control" value="{{ is_null(old("website")) ? $product->website : old("website") }}"/>
                    @if($errors->has("website"))
                     <span class="help-block">{{ $errors->first("website") }}</span>
                    @endif
                 </div>
                 <div class="form-group @if($errors->has('alamat')) has-error @endif">
                       <label for="website-field">Alamat</label>
                    <input type="text" id="alamat-field" name="alamat" class="form-control" value="{{ is_null(old("alamat")) ? $product->alamat : old("alamat") }}"/>
                       @if($errors->has("alamat"))
                        <span class="help-block">{{ $errors->first("alamat") }}</span>
                       @endif
                    </div>
                 <div class="form-group @if($errors->has('marketing_book')) has-error @endif">
                       <label for="marketing_book-field">Marketing book</label>
                    <input type="file" id="marketing_book-field" name="marketing_book" class="form-control" value="{{ is_null(old("marketing_book")) ? $product->marketing_book : old("marketing_book") }}"/>
                       @if($errors->has("marketing_book"))
                        <span class="help-block">{{ $errors->first("marketing_book") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture_3D')) has-error @endif">
                       <label for="marketing_book-field">Pictures</label>
                    <input type="file" id="picture_3D-field" name="picture_3D[]" class="form-control" multiple />
                       @if($errors->has("picture_3D"))
                        <span class="help-block">{{ $errors->first("picture_3D") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('logo')) has-error @endif">
                    <label for="logo-field">Logo</label>
                    <input type="file" id="logo-field" name="logo" class="form-control" value="{{ old("logo") }}"/>
                        @if($errors->has("logo"))
                        <span class="help-block">{{ $errors->first("logo") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('alamat')) has-error @endif">
                       <label for="alamat-field">Address</label>
                    <input type="text" id="alamat-field" name="alamat" class="form-control" value="{{ is_null(old("alamat")) ? $product->alamat : old("alamat") }}"/>
                       @if($errors->has("alamat"))
                        <span class="help-block">{{ $errors->first("alamat") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lokasi_lat')) has-error @endif">
                       <label for="lokasi_lat-field">Latitude</label>
                    <input type="text" id="lokasi_lat-field" name="lokasi_lat" class="form-control" value="{{ is_null(old("lokasi_lat")) ? $product->lokasi_lat : old("lokasi_lat") }}"/>
                       @if($errors->has("lokasi_lat"))
                        <span class="help-block">{{ $errors->first("lokasi_lat") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('lokasi_long')) has-error @endif">
                       <label for="lokasi_long-field">Longitude</label>
                    <input type="text" id="lokasi_long-field" name="lokasi_long" class="form-control" value="{{ is_null(old("lokasi_long")) ? $product->lokasi_long : old("lokasi_long") }}"/>
                       @if($errors->has("lokasi_long"))
                        <span class="help-block">{{ $errors->first("lokasi_long") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
       CKEDITOR.replace('description-field');
  });
</script>

</body>
</html>

