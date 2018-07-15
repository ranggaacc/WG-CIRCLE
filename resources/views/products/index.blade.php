@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
  <div class="page-header clearfix">
      <h1>
          <i class="glyphicon glyphicon-align-justify"></i> Info Product
            <div class="box-tools pull-right">
            @if (Auth::user()->role=='admin') 
            <a class="btn btn-success" href="{{ route('products.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            @endif
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
            @if($products->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE</th>
                            <th>NAME</th>
                            <th>JENIS</th>
                            <th>PROGRESS</th>
                            <th>WEBISTE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->kode}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->jenis}}</td>
                                <td>{{$product->progress}}</td>
                                <td>{{$product->website}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('products.show', $product->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('products.edit', $product->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    @if (Auth::user()->role=='admin') 
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
                {!! $products->render() !!}
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

