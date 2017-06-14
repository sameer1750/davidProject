<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    {!! Form::label('employee_id', 'Employee', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('employee_id', $employees, null, ['class' => 'form-control','placeholder'=>'select Employee']) !!}
        {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('gross_salary') ? 'has-error' : ''}}">
    {!! Form::label('gross_salary', 'Gross Salary', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('gross_salary', null, ['class' => 'form-control']) !!}
        {!! $errors->first('gross_salary', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('applicable_from_date') ? 'has-error' : ''}}">
    {!! Form::label('applicable_from_date', 'Applicable From Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('applicable_from_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('applicable_from_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : ''}}">
    {!! Form::label('basic_salary', 'Basic Salary', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('basic_salary', null, ['class' => 'form-control']) !!}
        {!! $errors->first('basic_salary', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('hra') ? 'has-error' : ''}}">
    {!! Form::label('hra', 'Hra', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('hra', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hra', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('special_allowance') ? 'has-error' : ''}}">
    {!! Form::label('special_allowance', 'Special Allowance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('special_allowance', null, ['class' => 'form-control']) !!}
        {!! $errors->first('special_allowance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('medical_allowance') ? 'has-error' : ''}}">
    {!! Form::label('medical_allowance', 'Medical Allowance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('medical_allowance', null, ['class' => 'form-control']) !!}
        {!! $errors->first('medical_allowance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('other_allowance') ? 'has-error' : ''}}">
    {!! Form::label('other_allowance', 'Other Allowance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('other_allowance', null, ['class' => 'form-control']) !!}
        {!! $errors->first('other_allowance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('conveyance') ? 'has-error' : ''}}">
    {!! Form::label('conveyance', 'Conveyance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('conveyance', null, ['class' => 'form-control']) !!}
        {!! $errors->first('conveyance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('incentive') ? 'has-error' : ''}}">
    {!! Form::label('incentive', 'Incentive', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('incentive', null, ['class' => 'form-control']) !!}
        {!! $errors->first('incentive', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('income_tax') ? 'has-error' : ''}}">
    {!! Form::label('income_tax', 'Income Tax', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('income_tax', null, ['class' => 'form-control']) !!}
        {!! $errors->first('income_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('profession_tax') ? 'has-error' : ''}}">
    {!! Form::label('profession_tax', 'Profession Tax', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('profession_tax', null, ['class' => 'form-control']) !!}
        {!! $errors->first('profession_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pf_deduction') ? 'has-error' : ''}}">
    {!! Form::label('pf_deduction', 'Pf Deduction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pf_deduction', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pf_deduction', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('per_month_deduction') ? 'has-error' : ''}}">
    {!! Form::label('per_month_deduction', 'Per Month Deduction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('per_month_deduction', null, ['class' => 'form-control']) !!}
        {!! $errors->first('per_month_deduction', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
