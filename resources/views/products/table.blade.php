<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th>Thumnail</th>
        <th>Product Name</th>
        <th>Artist Name</th>
        <th>Amount</th>
        <th>Country</th>


            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    @if(!Auth::guest() && ($product->user_id == Auth::user()->id || Auth::user()->role_id < 3))
        <tr>
            <td><img src="/images/artworks/{{$product->sku}}/{{$product->image_fullview}}" width = 100px height = 100px ></td>
            <td>
                <a href="{!! route('products.show', [$product->id]) !!}">{!! $product->product_name !!}</a></td>
            <td>{!! $product->artist !!}</td>
            <td>${!! number_format($product->amount, 2) !!}</td>
            <td>{!! $product->country !!}</td>


            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
