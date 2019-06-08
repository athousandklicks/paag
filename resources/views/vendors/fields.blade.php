<!-- User Id Field -->
{!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'readonly']) !!}

<!-- Role Id Field -->
{!! Form::hidden('role_id', $role_id, ['class' => 'form-control', 'readonly']) !!}



<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>


<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Flag Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flag', 'Flag:') !!}
    {!! Form::text('flag', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::text('dob', null, ['class' => 'form-control']) !!}
</div>

<!-- Education Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('education', 'Education:') !!}
    {!! Form::textarea('education', null, ['class' => 'form-control']) !!}
</div>

<!-- Awards Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('awards', 'Awards:') !!}
    {!! Form::textarea('awards', null, ['class' => 'form-control']) !!}
</div>

<!-- Experience Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('experience', 'Experience:') !!}
    {!! Form::textarea('experience', null, ['class' => 'form-control']) !!}
</div>

<!-- Exhibitions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('exhibitions', 'Exhibitions:') !!}
    {!! Form::textarea('exhibitions', null, ['class' => 'form-control']) !!}
</div>

<!-- Mentors Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mentors', 'Mentors:') !!}
    {!! Form::textarea('mentors', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vendors.index') !!}" class="btn btn-default">Cancel</a>
</div>
