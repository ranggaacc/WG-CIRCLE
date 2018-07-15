@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
  <div class="page-header clearfix">
      <h1>
          <i class="glyphicon glyphicon-align-justify"></i> Transactions
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
            @if($transactions->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE_ORDER</th>
                        <th>NOTE</th>
                        <th>QUANTITY</th>
                        <th>CLOSING_DATE</th>
                        <th>ID_PRODUCT</th>
                        <th>ID_REWARD</th>
                        <th>ID_CUSTOMER</th>
                        <th>ID_MEMBER</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->kode_order}}</td>
                    <td>{{$transaction->note}}</td>
                    <td>{{$transaction->quantity}}</td>
                    <td>{{$transaction->closing_date}}</td>
                    <td>{{$transaction->id_product}}</td>
                    <td>{{$transaction->id_reward}}</td>
                    <td>{{$transaction->id_customer}}</td>
                    <td>{{$transaction->id_member}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('transactions.show', $transaction->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('transactions.edit', $transaction->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $transactions->render() !!}
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

