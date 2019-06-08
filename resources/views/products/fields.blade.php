<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>


<!-- User ID Field -->
{!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'readonly']) !!}


<!-- SKU Field -->
{!! Form::hidden('sku', $sku, ['class' => 'form-control', 'readonly']) !!}

<!-- Artist Field -->
<div class="form-group col-sm-6">
    {!! Form::label('artist', 'Artist Name:') !!}
    {!! Form::text('artist', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">

    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', $types, ['class' => 'form-control']) !!}
</div>

<!-- Support Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('support_type', 'Support Type:') !!}
    {!! Form::select('support_type', $supports, ['class' => 'form-control']) !!}
</div>

<!-- Height Field -->
<div class="form-group col-sm-6">
    {!! Form::label('height', 'Height:') !!}
    {!! Form::text('height', null, ['class' => 'form-control']) !!}
</div>

<!-- Width Field -->
<div class="form-group col-sm-6">
    {!! Form::label('width', 'Width:') !!}
    {!! Form::text('width', null, ['class' => 'form-control']) !!}
</div>

<!-- Depth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depth', 'Depth:') !!}
    {!! Form::text('depth', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Year Created Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year_created', 'Year Created:') !!}
    {!! Form::text('year_created', null, ['class' => 'form-control']) !!}
</div>

<!-- Hangable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hangable', 'Hangable:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hangable', 0) !!}
        {!! Form::checkbox('hangable', '1', null) !!} Make Active
    </label>
</div>

<!-- Frame Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frame', 'Frame:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('frame', 0) !!}
        {!! Form::checkbox('frame', '1', null) !!} Make Active
    </label>
</div>

<!-- Sign Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sign', 'Sign:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sign', 0) !!}
        {!! Form::checkbox('sign', '1', null) !!} Make Active
    </label>
</div>

<!-- Signature Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('signature_location', 'Signature Location:') !!}
    {!! Form::select('signature_location', $sign_locations, ['class' => 'form-control']) !!}

</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-6 mb-3">
    {{ Form::label('tags', 'Tags:') }}
    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mb-3">
    {{ Form::label('styles', 'Styles:') }}
    <select class="form-control select2-multi" name="styles[]" multiple="multiple">
        @foreach($styles as $style)
        <option value='{{ $style->id }}'>{{ $style->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mb-3">
    {{ Form::label('subjects', 'Subjects:') }}
    <select class="form-control select2-multi" name="subjects[]" multiple="multiple">
        @foreach($subjects as $subject)
        <option value='{{ $subject->id }}'>{{ $subject->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mb-3">
    {{ Form::label('mediums', 'Mediums:') }}
    <select class="form-control select2-multi" name="mediums[]" multiple="multiple">
        @foreach($mediums as $medium)
        <option value='{{ $medium->id }}'>{{ $medium->name }}</option>
        @endforeach
    </select>
</div>


<!-- Brief Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('brief_description', 'Brief Description:') !!}
    {!! Form::textarea('brief_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('full_description', 'Full Description:') !!}
    {!! Form::textarea('full_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Dimension Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dimension_description', 'Dimension Description:') !!}
    {!! Form::textarea('dimension_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Fullview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_fullview', 'Image Fullview:') !!}
    {!! Form::file('image_fullview', ['class' => 'form-control']) !!}
</div>

<!-- Image Leftside Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_leftside', 'Image Leftside:') !!}
    {!! Form::file('image_leftside', ['class' => 'form-control']) !!}
</div>

<!-- Image Rightside Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_rightside', 'Image Rightside:') !!}
    {!! Form::file('image_rightside', ['class' => 'form-control']) !!}
</div>

<!-- Image Back Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_back', 'Image Back:') !!}
    {!! Form::file('image_back', ['class' => 'form-control']) !!}
</div>

<!-- Image Hanged Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_hanged', 'Image Hanged:') !!}
    {!! Form::file('image_hanged', ['class' => 'form-control']) !!}
</div>

<!-- Image Gallery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_gallery', 'Image Gallery:') !!}
    {!! Form::file('image_gallery', ['class' => 'form-control']) !!}
</div>


<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
