<table class="table table-responsive" id="signs-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($signs as $sign)
        <tr>
            <td>{!! $sign->name !!}</td>
            <td>
                {!! Form::open(['route' => ['signs.destroy', $sign->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('signs.show', [$sign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('signs.edit', [$sign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>