<table class="table table-responsive" id="transactions-table">
    <thead>
        <tr>

        <th>Product Name</th>
        <th>Product Owner</th>
            <th>Artist</th>
        <th>Buyer Name</th>
        <th>Amount</th>
        <th>Status</th>
<!--            <th colspan="3">Action</th>-->
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
    @if(!Auth::guest() && ($transaction->user_id == Auth::user()->id || Auth::user()->role_id < 3))
        <tr>
            <td>
            <a href="{!! route('transactions.show', [$transaction->id]) !!}">
            {!! $transaction->products['product_name'] !!}
            </a>
            </td>
            <td>{!! $transaction->product_owner['name'] !!}</td>
            <td>{!! $transaction->products['artist'] !!}</td>
            <td>{!! $transaction->user['name'] !!}</td>
            <td>${!! number_format($transaction->amount, 2) !!}</td>
            <td>{!! $transaction->status !!}</td>

<!--
            <td>
                {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transactions.show', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
-->

        </tr>
        @endif
    @endforeach
    </tbody>
</table>
