<table class="table table-responsive" id="media-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($media as $medium)
        <tr>
            <td>{!! $medium->name !!}</td>
            <td>
                {!! Form::open(['route' => ['media.destroy', $medium->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('media.show', [$medium->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('media.edit', [$medium->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>