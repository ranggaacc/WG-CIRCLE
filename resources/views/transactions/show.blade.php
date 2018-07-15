@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="page-header">
        <h1>Transactions / Show #{{$transaction->id}}</h1>
        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('transactions.edit', $transaction->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="kode_order">KODE_ORDER</label>
                     <p class="form-control-static">{{$transaction->kode_order}}</p>
                </div>
                    <div class="form-group">
                     <label for="note">NOTE</label>
                     <p class="form-control-static">{{$transaction->note}}</p>
                </div>
                    <div class="form-group">
                     <label for="quantity">QUANTITY</label>
                     <p class="form-control-static">{{$transaction->quantity}}</p>
                </div>
                    <div class="form-group">
                     <label for="closing_date">CLOSING_DATE</label>
                     <p class="form-control-static">{{$transaction->closing_date}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_product">ID_PRODUCT</label>
                     <p class="form-control-static">{{$transaction->id_product}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_reward">ID_REWARD</label>
                     <p class="form-control-static">{{$transaction->id_reward}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_customer">ID_CUSTOMER</label>
                     <p class="form-control-static">{{$transaction->id_customer}}</p>
                </div>
                    <div class="form-group">
                     <label for="id_member">ID_MEMBER</label>
                     <p class="form-control-static">{{$transaction->id_member}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('transactions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
<script>
</script>
</body>
</html>
