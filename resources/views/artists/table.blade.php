<table class="table table-responsive" id="artists-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Role Id</th>
        <th>Name</th>
        <th>About</th>
        <th>Cv</th>
        <th>Exhibitions</th>
        <th>Mentors</th>
        <th>Tags</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($artists as $artist)
        <tr>
            <td>{!! $artist->user_id !!}</td>
            <td>{!! $artist->role_id !!}</td>
            <td>{!! $artist->name !!}</td>
            <td>{!! $artist->about !!}</td>
            <td>{!! $artist->cv !!}</td>
            <td>{!! $artist->exhibitions !!}</td>
            <td>{!! $artist->mentors !!}</td>
            <td>{!! $artist->tags !!}</td>
            <td>{!! $artist->image !!}</td>
            <td>
                {!! Form::open(['route' => ['artists.destroy', $artist->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('artists.show', [$artist->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('artists.edit', [$artist->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>