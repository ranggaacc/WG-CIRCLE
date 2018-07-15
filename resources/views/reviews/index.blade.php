@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
  <div class="page-header clearfix">
      <h1>
          <i class="glyphicon glyphicon-align-justify"></i> Customer
                  <div class="box-tools pull-right">
      <a class="btn btn-success" href="{{ route('products.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
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
          @if($reviews->count())
              <table class="table table-condensed table-striped">
                  <thead>
                      <tr>
                      <th>No</th>
                      <th>ID Number</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>TTL</th>
                      <th>Sumber</th>
                      <th>Telepon</th> 
                      <th>Group</th> 
                      <th class="text-right">OPTIONS</th>
                      </tr>
                  </thead>

                  <tbody>
                      @foreach($reviews as $master_datum)
                          <tr>
                          <td>{{$master_datum->id}}</td>
                          <td>{{$master_datum->id}}</td>
                          <td>{{$master_datum->name}}</td>
                          <td>{{$master_datum->user}}</td>
                          <td>{{date('d-M-Y',strtotime($master_datum->created_at))}}</td>
                          <td>{{$master_datum->promotion}}</td>
                          <td align="right">{{$master_datum->price}}</td>
                            <td>-</td>  
                           <!-- <td>{{number_format($master_datum->price)}}</td>  -->
                              <td class="text-right">
                                  <a class="btn btn-xs btn-primary" href="{{ route('products.show', $master_datum->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                 <a class="btn btn-xs btn-warning" href="{{ route('products.edit', $master_datum->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>                                    
                                  <form action="{{ route('products.destroy', $master_datum->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              {!! $reviews->render() !!}
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
  $(".table").DataTable();
});
</script>
</body>
</html>

