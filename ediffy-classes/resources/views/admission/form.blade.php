<div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
    {!! Form::label('student_name', 'Student Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('student_name',[], null, ['class' => 'form-control','id'=>'search-name']) !!}
        {!! $errors->first('student_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
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
</div><div class="form-group {{ $errors->has('caste') ? 'has-error' : ''}}">
    {!! Form::label('caste', 'Caste', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('caste', null, ['class' => 'form-control']) !!}
        {!! $errors->first('caste', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('birth_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('gender', null, ['class' => 'form-control']) !!}
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">
    {!! Form::label('marital_status', 'Marital Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('marital_status', null, ['class' => 'form-control']) !!}
        {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('aadhaar_card_no') ? 'has-error' : ''}}">
    {!! Form::label('aadhaar_card_no', 'Aadhaar Card No', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('aadhaar_card_no', null, ['class' => 'form-control']) !!}
        {!! $errors->first('aadhaar_card_no', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('res_address') ? 'has-error' : ''}}">
    {!! Form::label('res_address', 'Res Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('res_address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('res_address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone_r') ? 'has-error' : ''}}">
    {!! Form::label('telephone_r', 'Telephone R', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telephone_r', null, ['class' => 'form-control']) !!}
        {!! $errors->first('telephone_r', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone_o') ? 'has-error' : ''}}">
    {!! Form::label('telephone_o', 'Telephone O', ['class' => 'col-md-4 control-label']) !!}
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
    {!! Form::label('area', 'Area', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('area', null, ['class' => 'form-control']) !!}
        {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
    {!! Form::label('education', 'Education', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('education', null, ['class' => 'form-control']) !!}
        {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('university') ? 'has-error' : ''}}">
    {!! Form::label('university', 'University', ['class' => 'col-md-4 control-label']) !!}
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
</div><div class="form-group {{ $errors->has('inquiry_date') ? 'has-error' : ''}}">
    {!! Form::label('inquiry_date', 'Inquiry Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('inquiry_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('inquiry_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    {!! Form::label('course_name', 'Course Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course_fees') ? 'has-error' : ''}}">
    {!! Form::label('course_fees', 'Course Fees', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('course_fees', null, ['class' => 'form-control']) !!}
        {!! $errors->first('course_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('total_fees') ? 'has-error' : ''}}">
    {!! Form::label('total_fees', 'Total Fees', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('total_fees', null, ['class' => 'form-control']) !!}
        {!! $errors->first('total_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('preferred_batch') ? 'has-error' : ''}}">
    {!! Form::label('preferred_batch', 'Preferred Batch', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('preferred_batch', null, ['class' => 'form-control']) !!}
        {!! $errors->first('preferred_batch', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enquiry_source') ? 'has-error' : ''}}">
    {!! Form::label('enquiry_source', 'Enquiry Source', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('enquiry_source', null, ['class' => 'form-control']) !!}
        {!! $errors->first('enquiry_source', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enquiry_taken_by') ? 'has-error' : ''}}">
    {!! Form::label('enquiry_taken_by', 'Enquiry Taken By', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('enquiry_taken_by', null, ['class' => 'form-control']) !!}
        {!! $errors->first('enquiry_taken_by', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('next_followup_required') ? 'has-error' : ''}}">
    {!! Form::label('next_followup_required', 'Next Followup Required', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('next_followup_required', null, ['class' => 'form-control']) !!}
        {!! $errors->first('next_followup_required', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('joining_chances') ? 'has-error' : ''}}">
    {!! Form::label('joining_chances', 'Joining Chances', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('joining_chances', null, ['class' => 'form-control']) !!}
        {!! $errors->first('joining_chances', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
