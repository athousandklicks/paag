@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        {!! $product->product_name !!}<br />

        <span class="small-font">SKU: </span>
        <span class="give-bottom-space">
            {!! $product->sku !!}
        </span><br />
        <span class="small-font">Owner: </span>
        <span class="give-bottom-space">
            <a href="/users/{!! $product->product_owner['id'] !!}">
                {!! $product->product_owner['name'] !!}
            </a>
        </span><br />
        <span class="small-font">Artist: </span>
        <span class="give-bottom-space">
            {!! $product->artist !!}
        </span><br />


        <span class="small-font">Amount: </span>
        <span class="give-bottom-space">
            ${!! number_format($product->amount, 2) !!}
        </span>
    </h1>

</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('products.show_fields')
                <a href="{!! route('products.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
