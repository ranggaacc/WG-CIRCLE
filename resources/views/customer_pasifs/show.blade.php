@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Referensi Pasif</h1>
        <form action="{{ route('customer_pasifs.destroy', $customer_pasif->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('customer_pasifs.edit', $customer_pasif->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="first_name">FIRST NAME</label>
                     <p class="form-control-static">{{$customer_pasif->first_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="middle_name">MIDDLE NAME</label>
                     <p class="form-control-static">{{$customer_pasif->middle_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_card">ID CARD/KTP</label>
                     <p class="form-control-static">{{$customer_pasif->id_card}}</p>
                </div>
                    <div class="form-group">
                     <label for="no_member">NO MEMBER</label>
                     <p class="form-control-static">{{$customer_pasif->no_member}}</p>
                </div>
                    <div class="form-group">
                     <label for="no_pengajuan">NO PENGAJUAN</label>
                     <p class="form-control-static">{{$customer_pasif->no_pengajuan}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$customer_pasif->email}}</p>
                </div>
{{--                     <div class="form-group">
                     <label for="hp">HP</label>
                     <p class="form-control-static">{{$customer_pasif->hp}}</p>
                </div> --}}
                    <div class="form-group">
                     <label for="jalan">JALAN</label>
                     <p class="form-control-static">{{$customer_pasif->jalan}}</p>
                </div>
                    <div class="form-group">
                     <label for="kota">KOTA</label>
                     <p class="form-control-static">{{$customer_pasif->kota}}</p>
                </div>
                    <div class="form-group">
                     <label for="provinsi">PROVINSI</label>
                     <p class="form-control-static">{{$customer_pasif->provinsi}}</p>
                </div>
                    <div class="form-group">
                     <label for="negara">NEGARA</label>
                     <p class="form-control-static">Indonesia</p>
                </div>
                    <div class="form-group">
                     <label for="kodepos">KODE POS</label>
                     <p class="form-control-static">{{$customer_pasif->kodepos}}</p>
                </div>
                    <div class="form-group">
                     <label for="tipe_diminati">TIPE DIMINATI</label>
                     <p class="form-control-static">{{$customer_pasif->tipe_diminati}}</p>
                </div>
                    <div class="form-group">
                     <label for="lokasi_diminati">LOKASI DIMINATI</label>
                     <p class="form-control-static">{{$customer_pasif->lokasi_diminati}}</p>
                </div>
                    <div class="form-group">
                     <label for="picture">PICTURE</label>
                     <img width="100" height="100" src="{{ asset($customer_pasif->picture) }}" class="img-responsive"/>
                     </div>
            </form>

            <a class="btn btn-link" href="{{ route('customer_pasifs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>
