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
        <div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
            {!! Form::label('student_name', 'Student Name ', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('student_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('student_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
            {!! Form::label('father_name', 'Father Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
            {!! Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('mother_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('caste') ? 'has-error' : ''}}">
            {!! Form::label('caste', 'Caste', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('caste', $caste, null, ['class' => 'form-control']) !!}
                {!! $errors->first('caste', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
            {!! Form::label('birth_date', 'Birth Date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('birth_date', null, ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('birth_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <?php
            $gender = [
                'MALE'=>'Male',
                'FEMALE'=>'Female'
            ];
        ?>
        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
            {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('gender', $gender, null, ['class' => 'form-control']) !!}
                {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <?php
            $maritalStatus = [
                'MARRIED'=>'Married',
                'UNMARRIED'=>'UnMarried'
            ];
        ?>
        <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">
            {!! Form::label('marital_status', 'Marital Status', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('marital_status', $maritalStatus, null, ['class' => 'form-control']) !!}
                {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('aadhaar_card_no') ? 'has-error' : ''}}">
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
        </div><div class="form-group {{ $errors->has('telephone_r') ? 'has-error' : ''}}">
            {!! Form::label('telephone_r', 'Telephone (R)', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('telephone_r', null, ['class' => 'form-control']) !!}
                {!! $errors->first('telephone_r', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('telephone_o') ? 'has-error' : ''}}">
            {!! Form::label('telephone_o', 'Telephone (O)', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('telephone_o', null, ['class' => 'form-control']) !!}
                {!! $errors->first('telephone_o', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
            {!! Form::label('zip_code', 'Zip Code', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
                {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
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
        </div><div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
            {!! Form::label('area', 'Area/L', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('area', $area,null, ['class' => 'form-control']) !!}
                {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="panel panel-default  panel-success">
        <div class="panel-heading"><b>Education Details</b></div>
        <br/>
        <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
            {!! Form::label('education', 'Education', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('education', $education, null, ['class' => 'form-control']) !!}
                {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('university') ? 'has-error' : ''}}">
            {!! Form::label('university', 'University/Board', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('university', null, ['class' => 'form-control']) !!}
                {!! $errors->first('university', '<p class="help-block">:message</p>') !!}
            </div>
        </div><div class="form-group {{ $errors->has('it_knowledge') ? 'has-error' : ''}}">
            {!! Form::label('it_knowledge', 'It Knowledge', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('it_knowledge', null, ['class' => 'form-control']) !!}
                {!! $errors->first('it_knowledge', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="panel panel-default  panel-success">
        <div class="panel-heading"><b>Course Details</b></div>
        <br/>
        <div class="form-group {{ $errors->has('inquiry_date') ? 'has-error' : ''}}">
            {!! Form::label('inquiry_date', 'Inquiry Date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('inquiry_date', null, ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('inquiry_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
            {!! Form::label('course_name', 'Course Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('course_name', $courseName, null, ['class' => 'form-control','placeholder'=>'Select Course']) !!}
                {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('center_id') ? 'has-error' : ''}}">
            {!! Form::label('center_id', 'Center', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('center_id', $center,  null, ['class' => 'form-control']) !!}
                {!! $errors->first('center_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('course_completion') ? 'has-error' : ''}}">
            {!! Form::label('course_completion', 'Course Completion Date', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('course_completion', null, ['class' => 'form-control','id'=>'completionDate','disabled'=>'disabled']) !!}
                {!! $errors->first('course_completion', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
            {!! Form::label('course_name', 'Module Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                <div class="well well-sm" id="cm" style="padding:0px;height: 100px; overflow: auto;">

                </div>
            </div>
            <span id="addCourse" class="btn btn-primary btn-xs">Add</span>
        </div>
        <div class="form-group {{ $errors->has('preferred_batch') ? 'has-error' : ''}}">
            {!! Form::label('preferred_batch', 'Preferred Batch', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('preferred_batch', $batch,null, ['class' => 'form-control','placeholder'=>'Select Batch']) !!}
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

</div>
<div class="form-group {{ $errors->has('total_fees') ? 'has-error' : ''}}">
    {!! Form::label('total_fees', 'Total Fees', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('total_fees', 0, ['class' => 'form-control','disabled'=>'disabled']) !!}
        {!! $errors->first('total_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enquiry_source') ? 'has-error' : ''}}">
    {!! Form::label('enquiry_source', 'Enquiry Source', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('enquiry_source', $enquirySource, null, ['class' => 'form-control']) !!}
        {!! $errors->first('enquiry_source', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enquiry_taken_by') ? 'has-error' : ''}}">
    {!! Form::label('enquiry_taken_by', 'Enquiry Taken By', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('enquiry_taken_by', auth()->user()->first_name.' '.auth()->user()->last_name, ['class' => 'form-control','disabled'=>'disabled']) !!}
        {!! $errors->first('enquiry_taken_by', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php
    $followUp = [
        'YES'=>'Yes',
        'No'=>'No'
    ];
?>
<div class="form-group {{ $errors->has('next_followup_required') ? 'has-error' : ''}}">
    {!! Form::label('next_followup_required', 'Next Followup Required', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('next_followup_required',$followUp, null, ['class' => 'form-control']) !!}
        {!! $errors->first('next_followup_required', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('job_required') ? 'has-error' : ''}}">
    {!! Form::label('job_required', 'Job Required', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('job_required', ['YES'=>'Yes','NO'=>'No'],null, ['class' => 'form-control']) !!}
        {!! $errors->first('job_required', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<?php
    $joinChances = [
        'YES'=>'Yes',
        'NO'=>'No',
        'MAYBE'=>'Maybe'
    ];
?>
<div class="form-group {{ $errors->has('joining_chances') ? 'has-error' : ''}}">
    {!! Form::label('joining_chances', 'Joining Chances', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('joining_chances', $joinChances,null, ['class' => 'form-control']) !!}
        {!! $errors->first('joining_chances', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('enquiry_on') ? 'has-error' : ''}}">
    {!! Form::label('enquiry_on', 'On', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('enquiry_on', null, ['class' => 'form-control datepicker']) !!}
        {!! $errors->first('enquiry_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-1">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
    </div>
    <div class=" col-md-2">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save and Proceed to Admission', ['class' => 'btn btn-primary','name'=>'adbtn']) !!}
    </div>
</div>

