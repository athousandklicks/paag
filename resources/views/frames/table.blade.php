<table class="table table-responsive" id="frames-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($frames as $frame)
        <tr>
            <td>{!! $frame->name !!}</td>
            <td>
                {!! Form::open(['route' => ['frames.destroy', $frame->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('frames.show', [$frame->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('frames.edit', [$frame->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>