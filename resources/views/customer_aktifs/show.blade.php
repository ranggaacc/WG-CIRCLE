@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Referensi Aktif</h1>
        <form action="{{ route('customer_aktifs.destroy', $customer_aktif->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('customer_aktifs.edit', $customer_aktif->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="no_member">NO MEMBER</label>
                     <p class="form-control-static">{{$customer_aktif->no_member}}</p>
                </div>
                    <div class="form-group">
                     <label for="no_pengajuan">NO PENGAJUAN</label>
                     <p class="form-control-static">{{$customer_aktif->no_pengajuan}}</p>
                </div>
                <div class="form-group">
                     <label for="first_name">FIRST NAME</label>
                     <p class="form-control-static">{{$customer_aktif->first_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="middle_name">MIDDLE NAME</label>
                     <p class="form-control-static">{{$customer_aktif->middle_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_card">ID CARD/KTP</label>
                     <p class="form-control-static">{{$customer_aktif->id_card}}</p>
                </div>
                    <div class="form-group">
                     <label for="no_member">NO MEMBER</label>
                     <p class="form-control-static">{{$customer_aktif->no_member}}</p>
                </div>
                    <div class="form-group">
                     <label for="lokasi_diminati">LOKASI DIMINATI</label>
                     <p class="form-control-static">{{$customer_aktif->product['name']}}</p>
                </div>
                    <div class="form-group">
                     <label for="picture">PICTURE</label>
                     <img width="100" height="100" src="{{ asset($customer_aktif->picture) }}" class="img-responsive"/>
                     </div>
            </form>

            <a class="btn btn-link" href="{{ route('customer_aktifs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>
