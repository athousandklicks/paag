<table class="table table-responsive" id="vendors-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Role Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Email Verified At</th>
        <th>Password</th>
        <th>Country</th>
        <th>Flag</th>
        <th>Avatar</th>
        <th>Bio</th>
        <th>Dob</th>
        <th>Education</th>
        <th>Awards</th>
        <th>Experience</th>
        <th>Exhibitions</th>
        <th>Mentors</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vendors as $vendor)
        <tr>
            <td>{!! $vendor->user_id !!}</td>
            <td>{!! $vendor->role_id !!}</td>
            <td>{!! $vendor->first_name !!}</td>
            <td>{!! $vendor->last_name !!}</td>
            <td>{!! $vendor->username !!}</td>
            <td>{!! $vendor->phone !!}</td>
            <td>{!! $vendor->email !!}</td>
            <td>{!! $vendor->email_verified_at !!}</td>
            <td>{!! $vendor->password !!}</td>
            <td>{!! $vendor->country !!}</td>
            <td>{!! $vendor->flag !!}</td>
            <td>{!! $vendor->avatar !!}</td>
            <td>{!! $vendor->bio !!}</td>
            <td>{!! $vendor->dob !!}</td>
            <td>{!! $vendor->education !!}</td>
            <td>{!! $vendor->awards !!}</td>
            <td>{!! $vendor->experience !!}</td>
            <td>{!! $vendor->exhibitions !!}</td>
            <td>{!! $vendor->mentors !!}</td>
            <td>{!! $vendor->status !!}</td>
            <td>
                {!! Form::open(['route' => ['vendors.destroy', $vendor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vendors.show', [$vendor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vendors.edit', [$vendor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>