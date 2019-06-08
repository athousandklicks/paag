<table class="table table-responsive" id="addresses-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address1</th>
        <th>Address2</th>
        <th>Town</th>
        <th>City</th>
        <th>Postcode</th>
        <th>State</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($addresses as $address)
        <tr>
            <td>{!! $address->user_id !!}</td>
            <td>{!! $address->firstname !!}</td>
            <td>{!! $address->lastname !!}</td>
            <td>{!! $address->address1 !!}</td>
            <td>{!! $address->address2 !!}</td>
            <td>{!! $address->town !!}</td>
            <td>{!! $address->city !!}</td>
            <td>{!! $address->postcode !!}</td>
            <td>{!! $address->state !!}</td>
            <td>{!! $address->country !!}</td>
            <td>{!! $address->phone !!}</td>
            <td>{!! $address->email !!}</td>
            <td>
                {!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('addresses.show', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('addresses.edit', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>