<style>
    .form-horizontal .control-label{
        text-align: left;
        padding-left: 25px;
    }
    .control-label:after {
        content: ": ";
        float:right;
    }
</style>
<div class="panel-group">
    <div class="panel panel-default  panel-success">
        <div class="panel-heading"><b>Personal Details</b></div>
        <br/>
        <div class="form-group {{ $errors->has('inquiry') ? 'has-error' : ''}}">
            {!! Form::label('student_name', 'Student Name ', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('student_name', null, ['class' => 'form-control','placeholder'=>'Double Click to get User List']) !!}
                {!! Form::input('hidden','inquiry_id', null, ['class' => 'form-control','id'=>'inquiry_id']) !!}

                {!! $errors->first('student_name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                <div class="col-md-4">
                    {{--<img id="blah" width="90" height="90" alt="Your image" />--}}
                    {!! Form::file('image', null, ['class' => 'form-control','id'=>'search-name']) !!}
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        {{--<div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">--}}

        {{--</div>--}}

        <div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
            {!! Form::label('father_name', 'Father Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('father_occupation') ? 'has-error' : ''}}">
            {!! Form::label('father_occupation', 'Father Occupation', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('father_occupation', null, ['class' => 'form-control']) !!}
                {!! $errors->first('father_occupation', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        {{--<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('mother_name', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group {{ $errors->has('caste') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('caste', 'Caste', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('caste', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('caste', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('birth_date', 'Birth Date', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('birth_date', null, ['class' => 'form-control datepicker']) !!}--}}
                {{--{!! $errors->first('birth_date', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <?php
        $gender = [
                'MALE'=>'Male',
                'FEMALE'=>'Female'
        ];
        ?>
        {{--<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::select('gender', $gender, null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('gender', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <?php
        $maritalStatus = [
                'MARRIED'=>'Married',
                'UNMARRIED'=>'UnMarried'
        ];
        ?>
        {{--<div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('marital_status', 'Marital Status', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::select('marital_status', $maritalStatus, null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group {{ $errors->has('aadhaar_card_no') ? 'has-error' : ''}}">
            {!! Form::label('aadhaar_card_no', 'Aadhaar Card No', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('aadhaar_card_no', null, ['class' => 'form-control']) !!}
                {!! $errors->first('aadhaar_card_no', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="panel panel-default  panel-success">
        <div class="panel-heading"><b>Contact Details</b></div>
        <br/>

        <div class="form-group {{ $errors->has('res_address') ? 'has-error' : ''}}">
            {!! Form::label('res_address', 'Res. Address', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('res_address', null, ['class' => 'form-control']) !!}
                {!! $errors->first('res_address', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        {{--<div class="form-group {{ $errors->has('telephone_r') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('telephone_r', 'Telephone (R)', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('telephone_r', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('telephone_r', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div><div class="form-group {{ $errors->has('telephone_o') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('telephone_o', 'Telephone (O)', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('telephone_o', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('telephone_o', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div><div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('zip_code', 'Zip Code', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('zip_code', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
            {!! Form::label('mobile_no', 'Mobile No', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('mobile_no', null, ['class' => 'form-control']) !!}
                {!! $errors->first('mobile_no', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        {{--<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('area', 'Area/L', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('area',null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('area', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    {{--<div class="panel panel-default  panel-success">--}}
        {{--<div class="panel-heading"><b>Education Details</b></div>--}}
        {{--<br/>--}}
        {{--<div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('education', 'Education', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('education', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('education', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div><div class="form-group {{ $errors->has('university') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('university', 'University/Board', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('university', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('university', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div><div class="form-group {{ $errors->has('it_knowledge') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('it_knowledge', 'It Knowledge', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('it_knowledge', null, ['class' => 'form-control']) !!}--}}
                {{--{!! $errors->first('it_knowledge', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="panel panel-default panel-success">
        <div class="panel-heading"><b>Course Details</b></div>
        <br/>
        {{--<div class="form-group {{ $errors->has('inquiry_date') ? 'has-error' : ''}}">--}}
            {{--{!! Form::label('inquiry_date', 'Inquiry Date', ['class' => 'col-md-4 control-label']) !!}--}}
            {{--<div class="col-md-6">--}}
                {{--{!! Form::text('inquiry_date', null, ['class' => 'form-control datepicker']) !!}--}}
                {{--{!! $errors->first('inquiry_date', '<p class="help-block">:message</p>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
            {!! Form::label('course_name', 'Course Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('course_name', $courseName, null, ['class' => 'form-control generalSelect2','placeholder'=>'Select Course']) !!}
                {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('center_id') ? 'has-error' : ''}}">
            {!! Form::label('center_id', 'Center', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('center_id', $center, null, ['class' => 'form-control generalSelect2']) !!}
                {!! $errors->first('center_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('course_completion') ? 'has-error' : ''}}">
            {!! Form::label('course_completion', 'Course Completion Date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('course_completion', null, ['class' => 'form-control','id'=>'completionDate']) !!}
                {!! $errors->first('course_completion', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
            {!! Form::label('course_name', 'Course Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                <div class="well well-sm" id="cm" style="padding:0px;height: 100px; overflow: auto;">

                </div>
            </div>
            <span id="addCourse" class="btn btn-primary btn-xs">Add</span>
        </div>
        <div class="form-group {{ $errors->has('preferred_batch') ? 'has-error' : ''}}">
            {!! Form::label('preferred_batch', 'Preferred Batch', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('preferred_batch', $batch,null, ['class' => 'form-control ','placeholder'=>'Select Batch']) !!}
                {!! $errors->first('preferred_batch', '<p class="help-block">:message</p>') !!}
                <div id="se_avail"></div>
            </div>
            <div id="se_avail"></div>
        </div>
        <div class="form-group">
            {!! Form::label('selected_course_modules', 'Selected Courses', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                <div class="well well-sm" id="cms" style="padding:0px;height: 100px; overflow: auto;">
                    <div class="row">
                        <div class="col-md-3"><b>Course</b></div>
                        <div class="col-md-3"><b>Module</b></div>
                        <div class="col-md-2"><b>Fees</b></div>
                        <div class="col-md-2"><b>Batch</b></div>
                        <div class="col-md-2"><b>Remove</b></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
            {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('duration', null, ['class' => 'form-control']) !!}
                {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('fees_option') ? 'has-error' : ''}}">
            {!! Form::label('fees_option', 'Fees Option', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('fees_option', $feesOption,null, ['class' => 'form-control']) !!}
                {!! $errors->first('fees_option', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('course_fees') ? 'has-error' : ''}}">
            {!! Form::label('course_fees', 'Course Fees', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('course_fees', null, ['class' => 'form-control']) !!}
                {!! $errors->first('course_fees', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="panel panel-default panel-success">
        <div class="panel-heading"><b>Tax & Installment Setup</b></div>
        <br/>
        <div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
            {!! Form::label('discount', 'Discount', ['class' => 'col-md-4 control-label']) !!}
            <span id="dDiv">
            <div class="col-md-2">
                {!! Form::input('number','discount[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-2">
                {!! Form::select('discount_type[]',['PERCENT'=>'PERCENT','RUPEES'=>'RUPEES'], null, ['class' => 'form-control','id'=>'discount_type']) !!}
                {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
            </div>
            </span>

            <div class="col-md-2">
                <span id="addDiscount" class="btn btn-primary btn-sm"> Add More</span>
            </div>
        </div>
        <div class="form-group" id="cloneDiv"></div>
        <div class="form-group {{ $errors->has('total_fees') ? 'has-error' : ''}}">
            {!! Form::label('total_fees', 'Total Fees', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('total_fees', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
                {!! $errors->first('total_fees', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('tax_amt') ? 'has-error' : ''}}">
            {!! Form::label('tax_amt', 'Tax Amt.(If Any)', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('tax_amt', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
                {!! $errors->first('tax_amt', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('total_fees_inc_tax') ? 'has-error' : ''}}">
            {!! Form::label('total_fees_inc_tax', 'Total Fees (Inc Tax)', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('total_fees_inc_tax', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
                {!! $errors->first('total_fees_inc_tax', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('royalty') ? 'has-error' : ''}}">
            {!! Form::label('royalty', 'Royalty', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('royalty', 0, ['class' => 'form-control','readonly'=>'readonly']) !!}
                {!! $errors->first('royalty', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('apply_tax') ? 'has-error' : ''}}">
            {!! Form::label('apply_tax', 'Apply Tax', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::radio('apply_tax','yes') !!} Yes
                {!! Form::radio('apply_tax','no') !!} No
            </div>
        </div>
        <?php
        $taxMethod = [
                'EXCLUSIVE'=>'Exclusive',
                'INCLUSIVE'=>'Inclusive'
        ];
        ?>
        <div class="form-group {{ $errors->has('tax_method') ? 'has-error' : ''}}">
            {!! Form::label('tax_method', 'Tax Method', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('tax_method',$taxMethod, 0, ['class' => 'form-control']) !!}
                {!! $errors->first('tax_method', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('tax_type') ? 'has-error' : ''}}">
            {!! Form::label('tax_type', 'Tax Type', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                <div class="well well-sm" style="padding:0px;height: 100px; overflow: auto;">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3"><b>Tax Type</b></div>
                        <div class="col-md-3"><b>Rate %</b></div>
                        <div class="col-md-4"><b>Amount</b></div>
                    </div>

                        @foreach($taxType as $tt)
                        <div class="row">
                            <div class="col-md-2">{!! Form::checkbox('service_tax[]',$tt->rate_percent,null,['class'=>'taxType','readonly'=>'readonly']) !!}</div>
                            <div class="col-md-3">{{$tt->name}}</div>
                            <div class="col-md-3">{{$tt->rate_percent}}</div>
                            <div class="col-md-4">0</div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('down_payment') ? 'has-error' : ''}}">
            {!! Form::label('down_payment', 'Down Payment', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('down_payment', 0, ['class' => 'form-control']) !!}
                {!! $errors->first('down_payment', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('no_of_installment') ? 'has-error' : ''}}">
            {!! Form::label('no_of_installment', 'No Of Installment', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('no_of_installment', 0, ['class' => 'form-control']) !!}
                {!! $errors->first('no_of_installment', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('installment_setup') ? 'has-error' : ''}}">
            {!! Form::label('installment_setup', 'Installment Setup', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                <div class="well well-sm" id="installments" style="padding:0px;height: 100px; overflow: auto;">
                    <div class="row">
                        <div class="col-md-2"><b>No</b></div>
                        <div class="col-md-5"><b>Due Date</b></div>
                        <div class="col-md-5"><b>Amount</b></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


{{--<div class="form-group {{ $errors->has('enquiry_source') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('enquiry_source', 'Enquiry Source', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::text('enquiry_source', null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('enquiry_source', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div><div class="form-group {{ $errors->has('enquiry_taken_by') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('enquiry_taken_by', 'Enquiry Taken By', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::text('enquiry_taken_by', auth()->user()->first_name.' '.auth()->user()->last_name, ['class' => 'form-control','readonly'=>'readonly']) !!}--}}
        {{--{!! $errors->first('enquiry_taken_by', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('remarks', 'Remarks', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<?php
$followUp = [
        'YES'=>'Yes',
        'No'=>'No'
];
?>
{{--<div class="form-group {{ $errors->has('next_followup_required') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('next_followup_required', 'Next Followup Required', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::select('next_followup_required',$followUp, null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('next_followup_required', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<?php
$joinChances = [
        'YES'=>'Yes',
        'NO'=>'No',
        'MAYBE'=>'Maybe'
];
?>
{{--<div class="form-group {{ $errors->has('joining_chances') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('joining_chances', 'Joining Chances', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::select('joining_chances', $joinChances,null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('joining_chances', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('enquiry_on') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('enquiry_on', 'On', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::text('enquiry_on', null, ['class' => 'form-control datepicker']) !!}--}}
        {{--{!! $errors->first('enquiry_on', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('admission_date') ? 'has-error' : ''}}">
    {!! Form::label('admission_date', 'Admission Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('admission_date', null, ['class' => 'form-control datepicker']) !!}
        {!! $errors->first('admission_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('job_required') ? 'has-error' : ''}}">
    {!! Form::label('job_required', 'Job Required', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('job_required', ['YES'=>'Yes','NO'=>'No'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('job_required', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('admission_remarks') ? 'has-error' : ''}}">
    {!! Form::label('admission_remarks', 'Admission Remarks', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('admission_remarks', null, ['class' => 'form-control']) !!}
        {!! $errors->first('admission_remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-6">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary','id'=>'btnSave']) !!}
        {{--{!! Form::submit('Save And Proceed to Fees Receipt', ['class' => 'btn btn-primary','name'=>'feeBtn']) !!}--}}
    </div>
</div>
