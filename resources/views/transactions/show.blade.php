@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Transaction:
            <a href="/products/{!! $transaction->products['id'] !!}" >
                {!! $transaction->products['product_name']!!}</a><br>
            <small> SKU: {!! $transaction->products['sku'] !!}</small>

        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transactions.show_fields')
                    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
