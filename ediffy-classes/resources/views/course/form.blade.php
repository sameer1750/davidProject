<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('short_name') ? 'has-error' : ''}}">
    {!! Form::label('short_name', 'Short Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('short_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('short_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Duration') ? 'has-error' : ''}}">
    {!! Form::label('Duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('Duration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('govt_course') ? 'has-error' : ''}}">
    {!! Form::label('govt_course', 'Govt Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('govt_course', null, ['class' => 'form-control']) !!}
        {!! $errors->first('govt_course', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('default_fees') ? 'has-error' : ''}}">
    {!! Form::label('default_fees', 'Default Fees', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('default_fees', null, ['class' => 'form-control']) !!}
        {!! $errors->first('default_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('default_royalty_fees') ? 'has-error' : ''}}">
    {!! Form::label('default_royalty_fees', 'Default Royalty Fees', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('default_royalty_fees', null, ['class' => 'form-control']) !!}
        {!! $errors->first('default_royalty_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('module_ids') ? 'has-error' : ''}}">
    {!! Form::label('module_ids', 'Modules', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="well well-sm" style="height: 300px; overflow: auto;">
            @foreach($modules as $module)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('module_ids[]',$module->id,null,[]) !!}
                        <span>{{ $module->name }}</span>
                    </label>
                </div>
            @endforeach
        </div>
        {!! $errors->first('module_ids', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('center_ids') ? 'has-error' : ''}}">
    {!! Form::label('center_ids', 'Modules', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="well well-sm" style="height: 300px; overflow: auto;">
            @foreach($centers as $center)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('center_ids[]',$center->id,null,[]) !!}
                        <span>{{ $center->name }}</span>
                    </label>
                </div>
            @endforeach
        </div>
        {!! $errors->first('center_ids', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
