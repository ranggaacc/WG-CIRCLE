@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
  <div class="page-header clearfix">
      <h1>
          <i class="glyphicon glyphicon-align-justify"></i> Member
                  <div class="box-tools pull-right">
         </div>

      </h1>

  </div>
</section>
<section class="content">
  @include('error')
  @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
  @elseif(Session::has('message2'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
  @endif
    <div class="row">
        <div class="col-md-12">
            @if($admin_units->count())
                <table  id="table-member" class="table-condensed table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>NO MEMBER</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>TGL LAHIR</th>
                        <th>EMAIL</th>
                        <th>HP</th>
                        <th>No. Rekening</th>
                        <th>Nama Pemilik Rekening</th>
                        <th>NPWP</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($admin_units as $admin_unit)
                                <tr>
                                <td>{{$admin_unit->id}}</td>
                                <td>{{$admin_unit->no_member}}</td>
                                <td>{{$admin_unit->name}}</td>
                                <td>{{$admin_unit->id_card}}</td>
                                <td>{{$admin_unit->birthdate}}</td>
                                <td>{{$admin_unit->email}}</td>
                                <td>{{$admin_unit->hp}}</td>
                                <td>{{$admin_unit->norek}}</td>
                                <td>{{$admin_unit->atasnama}}</td>
                                <td>{{$admin_unit->npwp}}</td>
                                <td width="15%" class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin_units.show', $admin_unit->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    @if(Auth::user()->role=="admin")
                                    <form action="{{ route('admin_units.destroy', $admin_unit->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
                {!! $admin_units->render() !!}
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
    $("#table-member").DataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7,8,9 ]
                }
            }
        ]
    } );

  });
</script>
</body>
</html>

