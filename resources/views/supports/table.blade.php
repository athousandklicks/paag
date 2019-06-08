<table class="table table-responsive" id="supports-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($supports as $support)
        <tr>
            <td>{!! $support->name !!}</td>
            <td>
                {!! Form::open(['route' => ['supports.destroy', $support->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('supports.show', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('supports.edit', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>