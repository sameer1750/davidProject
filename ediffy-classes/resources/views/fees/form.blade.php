<div class="form-group {{ $errors->has('receipt_date') ? 'has-error' : ''}}">
    {!! Form::label('receipt_date', 'Receipt Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('receipt_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('receipt_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
    {!! Form::label('student_name', 'Student Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('student_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('student_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="panel panel-default panel-success">
    <div class="panel-heading"><b>Installment Details</b></div>
    <br/>
    <div class="form-group {{ $errors->has('course_fees') ? 'has-error' : ''}}">
        {!! Form::label('course_fees', 'Course Fees', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('course_fees', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('course_fees', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fees_received') ? 'has-error' : ''}}">
        {!! Form::label('fees_received', 'Fees Received', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('fees_received', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('fees_received', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fees_balance') ? 'has-error' : ''}}">
        {!! Form::label('fees_balance', 'Fees Balance', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('fees_balance', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('fees_balance', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('installment_amount') ? 'has-error' : ''}}">
        {!! Form::label('installment_amount', 'Installment Amount', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('installment_amount', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('installment_amount', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('total_fees') ? 'has-error' : ''}}">
        {!! Form::label('total_fees', 'Total Fees', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('total_fees', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('total_fees', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tax_amount') ? 'has-error' : ''}}">
        {!! Form::label('tax_amount', 'Tax Amount (If Any)', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('tax_amount', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('tax_amount', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('received_amount') ? 'has-error' : ''}}">
        {!! Form::label('received_amount', 'Received Amount', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('received_amount', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('received_amount', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('balance_amount') ? 'has-error' : ''}}">
        {!! Form::label('balance_amount', 'Balance Amount (EX. TAX)', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('balance_amount', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('balance_amount', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="panel panel-default panel-success">
    <div class="panel-heading"><b>Payment Details</b></div>
    <br/>
    <?php
        $modeOfPayment = [
            'CASH'=>'Cash',
            'CHEQUE'=>'Cheque',
            'PAY ORDER'=>'Pay Order',
            'CREDIT CARD'=>'Credit Card',
            'DEBIT CARD'=>'Debit Card',
            'PAYPAL'=>'Paypal',
            'PAYTM'=>'Paytm',
            'POSE MACHINE'=>'Pose Machine',
            'NETBANKING'=>'Netbanking'
        ];
    ?>
    <div class="form-group {{ $errors->has('mode_of_payment') ? 'has-error' : ''}}">
        {!! Form::label('mode_of_payment', 'Mode Of Payment', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('mode_of_payment', $modeOfPayment, null, ['class' => 'form-control']) !!}
            {!! $errors->first('mode_of_payment', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : ''}}">
        {!! Form::label('bank_name', 'Bank Name', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('cheque_no') ? 'has-error' : ''}}">
        {!! Form::label('cheque_no', 'Cheque No.', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('cheque_no', null, ['class' => 'form-control']) !!}
            {!! $errors->first('cheque_no', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cheque_date') ? 'has-error' : ''}}">
        {!! Form::label('cheque_date', 'Cheque Date', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('cheque_date', null, ['class' => 'form-control']) !!}
            {!! $errors->first('cheque_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('fees_recieved_by') ? 'has-error' : ''}}">
        {!! Form::label('fees_recieved_by', 'Fees Recieved By', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('fees_recieved_by', auth()->user()->first_name.' '.auth()->user()->last_name, ['class' => 'form-control','readonly'=>'readonly']) !!}
            {!! $errors->first('fees_recieved_by', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <?php
        $account = [
            '20% royalty from branches'=>'20% royalty from branches',
            'Extra in counter'=>'Extra in counter',
            'Form Fee'=>'Form Fee',
            'Hair Stylist'=>'Hair Stylist',
            'HANDSET REPAIRING TELECOM'=>'HANDSET REPAIRING TELECOM',
            'Installment Fee'=>'Installment Fee',
            'Jewellery Sales Associate'=>'Jewellery Sales Associate',
            'Late Fees'=>'Late Fees',
            'One Time Fees'=>'One Time Fees',
            'Other Income'=>'Other Income',
            'Registration Fees'=>'Registration Fees',
            'Retail Sales Associate'=>'Retail Sales Associate',
            'RPL - Assistant Beautician'=>'RPL - Assistant Beautician',
            'RPL - JRSA'=>'RPL - JRSA',
            'V.R.N. Fee'=>'V.R.N. Fee'
        ];
    ?>
    <div class="form-group {{ $errors->has('account') ? 'has-error' : ''}}">
        {!! Form::label('account', 'Account', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('account', $account, null, ['class' => 'form-control']) !!}
            {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="panel panel-default panel-success">
    <div class="panel-heading"><b>Student Details</b></div>
    <br/>
    <div class="form-group {{ $errors->has('last_installment') ? 'has-error' : ''}}">
        {!! Form::label('last_installment', 'Last Installment', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('last_installment', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
            {!! $errors->first('last_installment', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('i_card_id') ? 'has-error' : ''}}">
        {!! Form::label('i_card_id', 'I-Card Id', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('i_card_id', null, ['class' => 'form-control']) !!}
            {!! $errors->first('i_card_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
