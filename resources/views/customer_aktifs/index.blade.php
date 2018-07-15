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
            @if($customer_aktifs->count())
                <table id="table-cust-aktif" class="table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ID CARD</th>
                            <th>NO HP</th>
                            <th>NO MEMBER</th>
                            <th>NO PENGAJUAN</th>
                            <th>LOKASI DIMINATI</th>
                            <th>VALID DATE</th>
                            <th>STATUS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($customer_aktifs as $customer_aktif)
                            <tr>
                                <td>{{$customer_aktif->id}}</td>
                                <td>{{$customer_aktif->first_name}}</td>
                                <td>{{$customer_aktif->id_card}}</td>
                                <td>{{$customer_aktif->telephone}}</td>
                                <td>{{$customer_aktif->no_member}}</td>
                                <td>{{$customer_aktif->no_pengajuan}}</td>
                                <td>{{$customer_aktif->product['name']}}</td>
                                <td>{{$customer_aktif->nvaliddate}} days</td>
                                <td>@if($customer_aktif->pesanan['nilai_transaksi'] !=0) <span class="label label-success"> Buy </span> @elseif($customer_aktif->nvaliddate!=0) <span class="label label-primary"> Available </span> @else <span class="label label-danger">  Expired </span> @endif </td>
                                <td width="100%" class="text-right">
{{--                                     <a class="btn btn-xs btn-primary" href="{{ route('customer_aktifs.show', $customer_aktif->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a> --}}
                                    <a class="btn btn-xs btn-warning" href="{{ route('customer_aktifs.edit', $customer_aktif->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    @if(Auth::user()->role=="admin")
                                    <form action="{{ route('customer_aktifs.destroy', $customer_aktif->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $customer_aktifs->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer')
<script>
  $(function () {
    //Initialize Select2 Elements
    $("#table-cust-aktif").DataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            }
        ]
    } );

  });
</script>

</body>
</html>
