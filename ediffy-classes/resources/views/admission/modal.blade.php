<style>
    #myModal .form-control{
        height: 28px;
        padding: 3px 6px;
    }
    #myModal .form-group {
        margin-bottom: 1px;
    }
</style>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Enquiry</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3" style="font-size: 12px;border: 1px solid #ddd;">
                <div><b>Search Criteria</b></div>
                {{Form::open(['method'=>'GET','id'=>'modalForm'])}}
                <div class="form-group {{ $errors->has('enquiry_date') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_date', 'Enquiry Date', ['class' => 'control-label']) !!}
                    {!! Form::text('enquiry_date', request()->get('enquiry_date'), ['class' => 'form-control','id'=>'m_enquiry_date']) !!}
                </div>
                <div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
                    {!! Form::label('student_name', 'Student Name', ['class' => 'control-label']) !!}
                    {!! Form::text('student_name', request()->get('student_name'), ['class' => 'form-control','id'=>'m_student_name']) !!}
                </div>
                <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
                    {!! Form::label('mobile_no', 'Mobile No', ['class' => 'control-label']) !!}
                    {!! Form::text('mobile_no', request()->get('mobile_no'), ['class' => 'form-control','id'=>'m_mobile_no']) !!}
                </div>
                <div class="form-group {{ $errors->has('enquiry_source') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_source', 'Source', ['class' => 'control-label']) !!}
                    {!! Form::select('enquiry_source', $source, request()->get('enquiry_source'), ['class' => 'form-control','id'=>'m_enquiry_source','placeholder'=>'Enquiry Source']) !!}
                </div>
                <?php
                $gender = [
                        'MALE'=>'Male',
                        'FEMALE'=>'Female'
                ];
                ?>
                <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                    {!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
                    {!! Form::select('gender', $gender, request()->get('gender'), ['class' => 'form-control','id'=>'m_gender','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                    {!! Form::label('education', 'Education', ['class' => 'control-label']) !!}
                    {!! Form::select('education', $education, request()->get('gender'), ['class' => 'form-control','id'=>'m_education','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('enq_taken_by') ? 'has-error' : ''}}">
                    {!! Form::label('enq_taken_by', 'Enq. Taken By', ['class' => 'control-label']) !!}
                    {!! Form::select('enq_taken_by', $enqTaken, request()->get('enq_taken_by'), ['class' => 'form-control','id'=>'m_enq_taken_by','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
                    {!! Form::label('area', 'Area', ['class' => 'control-label']) !!}
                    {!! Form::select('area', $area, request()->get('gender'), ['class' => 'form-control','id'=>'m_area','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('enquiry_courses') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_courses', 'Enquiry Courses', ['class' => 'control-label']) !!}
                    {!! Form::select('enquiry_courses', $courseName, request()->get('enquiry_courses'), ['class' => 'form-control','id'=>'m_enquiry_courses','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', request()->get('email'), ['class' => 'form-control','id'=>'m_email','placeholder'=>'Select Course']) !!}
                </div>
                <div class="form-group {{ $errors->has('aadhaar_card_no') ? 'has-error' : ''}}">
                    {!! Form::label('aadhaar_card_no', 'Aadhaar Card No', ['class' => 'control-label']) !!}
                    {!! Form::text('aadhaar_card_no', request()->get('aadhaar_card_no'), ['class' => 'form-control','id'=>'m_aadhaar_card_no','placeholder'=>'Select Course']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Search', ['class' => 'btn btn-primary btn-sm','id'=>'modalSubmit']) !!}
                </div>
                {{Form::close()}}
            </div>
            <div class="col-md-9">
                <div class="table-responsive ">
                    <table class="table table-striped table-bordered" id="modalTable">
                        <thead>
                        <tr>
                            <th>Name</th><th>Aadhaar</th><th>Mobile</th><th>Email</th><th>Enquiry By</th><th>Enquiry Date</th><th>Select</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enquiry as $item)
                            <tr>

                                <td>{{ $item->student_name }}</td>
                                <td>{{ $item->aadhaar_card_no }}</td>
                                <td>{{ $item->mobile_no }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->enquiry_source }}</td>
                                <td>{{ $item->inquiry_date }}</td>
                                <td>{!! Form::radio('student',$item->id,null,['class'=>'modalradio']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
