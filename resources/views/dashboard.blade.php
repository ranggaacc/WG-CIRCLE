<!DOCTYPE html>
<html>
@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <!-- Main content -->
    <section class="content">
    <div class="row">
    <label for="kategori-field" style="margin-left:15px;" ><h4>Proyek</h4></label>
    <select name="proyek" id="proyek">
    <option value="_">Pilih Proyek</option>
    <option value="all">All</option>
    @foreach($products as $p)
        <option value="{{ $p->id }}">{{ $p->name }}</option>
    @endforeach

    </select>
</div>
      <div class="row">
      <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $member }}</h3> 
              <p>Jumlah Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="{{ url('/member') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $referensi }}</h3> 
              <p>Jumlah Referensi</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $aktif }}</h3> 
              <p>Referensi Aktif</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="{{ url('/customer_aktifs') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $pasif }}</h3> 
              <p>Referensi Pasif</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="{{ url('/customer_pasifs') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $close }}</h3> 
              <p>Referensi Close</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">
               <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $gagal }}</h3> 
              <p>Referensi Expired</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ number_format($transaksi) }}</h3> 
              <p>Nilai Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
@include('layouts.chartdashboard')
@include('page.activity-js.activitychart-day')
</script>
</body>
</html>

