<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('account_sub_group') ? 'has-error' : ''}}">
    {!! Form::label('account_sub_group', 'Account Sub Group', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('account_sub_group',$subAccount, null, ['class' => 'form-control']) !!}
        {!! $errors->first('account_sub_group', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
