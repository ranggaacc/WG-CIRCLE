@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="page-header clearfix">
        <h1>
            Data
        <small>Master</small>
            <!--<a class="btn btn-success pull-right" href="{{ route('master_datas.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>-->
        </h1>

    </div>
</section>
      <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Install Table -->
          <div class="box">
            <div class="box-body">
            @if($master_datas->count())
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Apps</th>
                    <th>IP</th>
                    <th>IMEI</th>
                    <th>Date</th>
                    <th>OS</th>
                    <th>View</th>
                    <th>Connect</th>
                    <th>Operator</th>
                    <th>Device</th>
                    <th>State</th>
                    <th>Regional</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($master_datas as $master_datum)
                    <tr>
                        <td>{{$master_datum->id_aplikasi}}</td>
                        <td>{{$master_datum->ip}}</td>
                        <td>{{$master_datum->imei}}</td>
                        <td>{{ date('d-m-Y',strtotime($master_datum->created_at))}}</td>
                        <td>{{$master_datum->os}}</td>
                        <td>{{$master_datum->view}}</td>
                        <td>{{$master_datum->connected_by}}</td>
                        <td>{{$master_datum->operator}}</td>
                        <td>{{$master_datum->type_device}}</td>
                        <td>{{$master_datum->state}}</td>
                        <td>{{$master_datum->regional}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              {!! $master_datas->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>

