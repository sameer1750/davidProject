<div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
    {!! Form::label('start_time', 'Start Time', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
        {!! $errors->first('start_time', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2">
        {!! Form::select('start_am_pm', ['AM'=>'AM','PM'=>'PM'],null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
    {!! Form::label('to', 'TO', ['class' => 'col-md-offset-1 col-md-4 control-label']) !!}

</div>


<div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
    {!! Form::label('end_time', 'End Time', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('end_time', null, ['class' => 'form-control']) !!}
        {!! $errors->first('end_time', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2">
        {!! Form::select('end_am_pm', ['AM'=>'AM','PM'=>'PM'],null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('max_students') ? 'has-error' : ''}}">
    {!! Form::label('max_students', 'Max Students', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('max_students', null, ['class' => 'form-control']) !!}
        {!! $errors->first('max_students', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('module') ? 'has-error' : ''}}">
    {!! Form::label('module', 'Modules', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="well well-sm"  style="height: 300px; overflow: auto;">
            @foreach($modules as $m)
                <div>
                    {{Form::checkbox('module_ids[]',$m->id,(in_array($m->id,$selectedModules))?true:false)}} {{$m->name}}
                </div>
              @endforeach
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
