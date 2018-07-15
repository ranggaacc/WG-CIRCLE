@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Product / Show #{{$product->id}}</h1>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('products.edit', $product->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$product->id}}</p>
                </div>
                    <div class="form-group">
                     <label for="price_list">LOGO</label>
                     <img width="100" height="100" src="{{ asset($product->logo) }}" class="img-responsive"/>
                </div>
                <div class="form-group">
                     <label for="kode">CODE</label>
                     <p class="form-control-static">{{$product->kode}}</p>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$product->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$product->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="jenis">TYPE</label>
                     <p class="form-control-static">{{$product->jenis}}</p>
                     </div>
                     <div class="form-group">
                      <label for="price_list">PRICE LIST</label>
                      <img width="100" height="100" src="{{ asset($product->price_list) }}" class="img-responsive"/>
                 </div>
                     <div class="form-group">
                     <label for="progress">PROGRESS</label>
                     <p class="form-control-static">{{$product->progress}}</p>
                </div>
                    <div class="form-group">
                     <label for="webiste">WEBISTE</label>
                     <p class="form-control-static">{{$product->website}}</p>
                </div>
                    <div class="form-group">
                        <label for="marketing_book">MARKETING BOOK</label>
                        <img width="100" height="100" src="{{ asset($product->marketing_book) }}" class="img-responsive"/>
                </div>
                <div class="form-group">
                    <label for="marketing_book">PICTURE</label>
                    <div class="row">
                    @foreach($product->pictures as $p)
                        <div class="col-md-2">
                          <img width="100" height="100" src="{{ asset($p) }}" class="img-responsive"/>
                        </div>
                     @endforeach
                     </div>
                </div>
                <div class="form-group">
                    <label for="lokasi_lat">ADDRESS</label>
                    <p class="form-control-static">{{$product->alamat}}</p>
                </div>
                <div class="form-group">
                <label for="lokasi_lat">LATITUDE</label>
                <p class="form-control-static">{{$product->lokasi_lat}}</p>
                </div>
               <div class="form-group">
                     <label for="lokasi_long">LONGITUDE</label>
                     <p class="form-control-static">{{$product->lokasi_long}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
<script>
</script>
</body>
</html>
