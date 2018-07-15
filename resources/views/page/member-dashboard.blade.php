@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section section-first section-member">
    <div class="container-fluid">
      <h2 class="section__h2">Member <span class="text-accent">Dashboard</span></h2>
      <div class="row">
        <div class="col-sm-2">
          <div class="dashboard-box">
            <div class="dashboard-box-row">
              @if(Auth::user()->picture!=null)
                <img src="{{ asset(Auth::user()->picture) }}" alt="" class="dashboard-box__img img-circle img-responsive">          
              @else
                <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="" class="dashboard-box__img img-circle img-responsive">
              @endif

            </div>
            <div class="dashboard-box-row clearfix text-center">
              <a href="{{ url('/edit-foto-member') }}">Edit Foto</a>
            </div>
            
            <div class="dashboard-box-row">
              <h3 class="dashboard-box__h3 text-center">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
              <span class="text-center"></span>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>ID Member</div>
              <div class="text-secondary" style="color:blue;">{{ Auth::user()->no_member }}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Status</div>
              <div class="text-secondary" style="color:green;">@if(Auth::user()->activate) aktif @else non-aktif @endif</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Referensi</div>
              <div class="text-secondary">{{ $customers->count() + $customerspasif->count()}}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
              <div>Poin</div>
              <div class="text-secondary">{{ $point }}</div>
            </div>
            <div class="dashboard-box-row clearfix text-center">
            <a href="{{ url('/member-logout') }}">Logout</a>
            </div>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="dashboard-box">
          @if($customers->count())
            <table class="table dashboard-box-table table-condensed table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>No KTP</th>
                  <th>Lokasi Diminati</th>
                  <th>No Pengajuan</th>
                  <th>Valid Date</th>
                  <th>Status</th>
                  <th>Jenis Referensi</th>
                  <th>Poin</th>
                  <th>Closing Fee</th>
                  <th>Sales Commission Fee</th>
                  <th>Tgl. Pencairan 1</th>
                  <th>Tgl. Pencairan 2</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $key => $product)
                <tr>
                    <td>{{$product->first_name}}</td>
                    <td>{{$product->id_card}}</td>
                    <td>{{$product->product['name']}}</td>
                    <td>{{$product->no_pengajuan}}</td>
                    <td>{{$product->nvaliddate}} days</td>
                    <td>@if($product->pesanan['nilai_transaksi'] !=0) <span class="label label-success"> Buy </span> @elseif($product->nvaliddate!=0) <span class="label label-primary"> Available </span> @else <span class="label label-danger">  Expired </span> @endif </td>
                    <td>Aktif</td>
                    <td>{{$product->pesanan['poin'] }}</td>
                    <td align="right">{{ number_format($product->pesanan['closing_fee']) }}</td>
                    <td align="right">{{ number_format($product->pesanan['sales_fee']) }}</td>
                    <td>{{$product->pesanan['date_fee_1'] }}</td>
                    <td>{{$product->pesanan['date_fee_2'] }}</td>
                </tr>
                @endforeach      
                @foreach($customerspasif as $key => $product)
                <tr>
                    <td>{{$product->first_name}}</td>
                    <td>{{$product->id_card}}</td>
                    <td>{{$product->product['name']}}</td>
                    <td>{{$product->no_pengajuan}}</td>
                    <td>{{$product->nvaliddate}} days</td>
                    <td>@if($product->pesanan['nilai_transaksi'] !=0) <span class="label label-success"> Buy </span> @elseif($product->nvaliddate!=0) <span class="label label-primary"> Available </span> @else <span class="label label-danger">  Expired </span> @endif </td>
                    <td>Pasif</td>
                    <td>{{$product->pesanan['poin'] }}</td>
                    <td align="right">{{ number_format($product->pesanan['closing_fee']) }}</td>
                    <td align="right">{{ number_format($product->pesanan['sales_fee']) }}</td>
                    <td>{{$product->pesanan['date_fee_1'] }}</td>
                    <td>{{$product->pesanan['date_fee_2'] }}</td>
                </tr>
                @endforeach      

              </tbody>
            </table>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.footer-public')
  <script>
  $(function () {
    $(".dashboard-box-table").DataTable({
        "scrollX": true
    });
  });
</script>
</body>
</html>