@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Transactions / Edit #{{$transaction->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('kode_order')) has-error @endif">
                       <label for="kode_order-field">Kode_order</label>
                    <input type="text" id="kode_order-field" name="kode_order" class="form-control" value="{{ is_null(old("kode_order")) ? $transaction->kode_order : old("kode_order") }}"/>
                       @if($errors->has("kode_order"))
                        <span class="help-block">{{ $errors->first("kode_order") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('note')) has-error @endif">
                       <label for="note-field">Note</label>
                    <input type="text" id="note-field" name="note" class="form-control" value="{{ is_null(old("note")) ? $transaction->note : old("note") }}"/>
                       @if($errors->has("note"))
                        <span class="help-block">{{ $errors->first("note") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('quantity')) has-error @endif">
                       <label for="quantity-field">Quantity</label>
                    <input type="text" id="quantity-field" name="quantity" class="form-control" value="{{ is_null(old("quantity")) ? $transaction->quantity : old("quantity") }}"/>
                       @if($errors->has("quantity"))
                        <span class="help-block">{{ $errors->first("quantity") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('closing_date')) has-error @endif">
                       <label for="closing_date-field">Closing_date</label>
                    <input type="text" id="closing_date-field" name="closing_date" class="form-control date-picker" value="{{ is_null(old("closing_date")) ? $transaction->closing_date : old("closing_date") }}"/>
                       @if($errors->has("closing_date"))
                        <span class="help-block">{{ $errors->first("closing_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_product')) has-error @endif">
                       <label for="id_product-field">Id_product</label>
                    <input type="text" id="id_product-field" name="id_product" class="form-control" value="{{ is_null(old("id_product")) ? $transaction->id_product : old("id_product") }}"/>
                       @if($errors->has("id_product"))
                        <span class="help-block">{{ $errors->first("id_product") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_reward')) has-error @endif">
                       <label for="id_reward-field">Id_reward</label>
                    <input type="text" id="id_reward-field" name="id_reward" class="form-control" value="{{ is_null(old("id_reward")) ? $transaction->id_reward : old("id_reward") }}"/>
                       @if($errors->has("id_reward"))
                        <span class="help-block">{{ $errors->first("id_reward") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_customer')) has-error @endif">
                       <label for="id_customer-field">Id_customer</label>
                    <input type="text" id="id_customer-field" name="id_customer" class="form-control" value="{{ is_null(old("id_customer")) ? $transaction->id_customer : old("id_customer") }}"/>
                       @if($errors->has("id_customer"))
                        <span class="help-block">{{ $errors->first("id_customer") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_member')) has-error @endif">
                       <label for="id_member-field">Id_member</label>
                    <input type="text" id="id_member-field" name="id_member" class="form-control" value="{{ is_null(old("id_member")) ? $transaction->id_member : old("id_member") }}"/>
                       @if($errors->has("id_member"))
                        <span class="help-block">{{ $errors->first("id_member") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('transactions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>
