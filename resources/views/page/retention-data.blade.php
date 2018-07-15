@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily
        <small>Retention </small>
      </h1>
    </section>
      <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Install Table -->
          <div class="box">
            <div class="box-body">
            @if($datas->count())
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Iklan</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($datas as $datum)
                    <tr>
                        <td>{{$datum->id}}</td>
                        <td>{{$datum->id_iklan}}</td>
                        <td>{{$datum->created_at}}</td>
                        <td>{{$datum->id_user}}</td>
                        <td>{{$datum->count}}</td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              {!! $datas->render() !!}
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
    <section class="content-header">
      <h1>
        Monthly
        <small>Retention </small>
      </h1>
    </section>
      <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Install Table -->
          <div class="box">
            <div class="box-body">
            @if($datas_month->count())
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Iklan</th>
                    <th>Month</th>
                    <th>User</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($datas_month as $datum)
                    <tr>
                        <td>{{$datum->id}}</td>
                        <td>{{$datum->id_iklan}}</td>
                        <td>{{$datum->created_at}}</td>
                        <td>{{$datum->id_user}}</td>
                        <td>{{$datum->count}}</td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              {!! $datas->render() !!}
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
        <section class="content-header">
      <h1>
        Yearly
        <small>Retention </small>
      </h1>
    </section>
      <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Install Table -->
          <div class="box">
            <div class="box-body">
            @if($datas_year->count())
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Iklan</th>
                    <th>Year</th>
                    <th>User</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($datas_year as $datum)
                    <tr>
                        <td>{{$datum->id}}</td>
                        <td>{{$datum->id_iklan}}</td>
                        <td>{{$datum->created_at}}</td>
                        <td>{{$datum->id_user}}</td>
                        <td>{{$datum->count}}</td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              {!! $datas->render() !!}
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
    $("#example2").DataTable();
    $("#example3").DataTable();
  });
</script>
</body>
</html>

