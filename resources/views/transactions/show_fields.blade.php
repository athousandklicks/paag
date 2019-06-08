<!-- Product Id Field -->
<!--
<div class="form-group">
    {!! Form::label('product_id', 'Product Name:') !!}
    <p><a href="/products/{!! $transaction->products['id'] !!}" >
    {!! $transaction->products['product_name'] !!}
        </a>
    </p>
</div>
-->

<!-- Product Owner Id Field -->
<div class="form-group">
    {!! Form::label('product_owner_id', 'Product Owner Name:') !!}
    <p><a href="/users/{!! $transaction->product_owner['id'] !!}">
        {!! $transaction->product_owner['name'] !!}
        </a></p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>${!! number_format($transaction->amount, 2) !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Buyer Name:') !!}
    <p>
        <a href="/users/{!! $transaction->user['id'] !!}">
            {!! $transaction->user['name'] !!} | {!! $transaction->user['email'] !!}
        </a>  </p>
</div>

<!-- Artist Name Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Artist Name:') !!}
    <p>
        <a href="/users/{!! $transaction->user['id'] !!}">
            {!! $transaction->products['artist'] !!}
        </a>  </p>
</div>

<!-- Payment Method Field -->
<div class="form-group">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{!! $transaction->payment_method !!}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $transaction->message !!}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $transaction->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaction->created_at->format('D d, M, Y h:i') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaction->updated_at->format('D d, M, Y h:i') !!}</p>
</div>

