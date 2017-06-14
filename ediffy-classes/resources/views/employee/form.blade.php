<div class="form-group {{ $errors->has('center_id') ? 'has-error' : ''}}">
    {!! Form::label('center_id', 'Center', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('center_id',$centers, null, ['class' => 'form-control']) !!}
        {!! $errors->first('center_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('emp_id') ? 'has-error' : ''}}">
    {!! Form::label('emp_id', 'Employee Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('number','emp_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('emp_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    {!! Form::label('full_name', 'Full Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    {!! Form::label('dob', 'Dob', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dob', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
    {!! Form::label('mobile_no', 'Mobile No', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mobile_no', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mobile_no', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('designation_id') ? 'has-error' : ''}}">
    {!! Form::label('designation_id', 'Designation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('designation_id',$designation, null, ['class' => 'form-control']) !!}
        {!! $errors->first('designation_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('joining_date') ? 'has-error' : ''}}">
    {!! Form::label('joining_date', 'Joining Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('joining_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('joining_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
