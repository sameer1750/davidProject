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
                <div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
                    {!! Form::label('student_name', 'Student Name', ['class' => 'control-label']) !!}
                    {!! Form::text('student_name', request()->get('student_name'), ['class' => 'form-control','id'=>'m_student_name']) !!}
                </div>
                <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
                    {!! Form::label('mobile_no', 'Mobile No', ['class' => 'control-label']) !!}
                    {!! Form::text('mobile_no', request()->get('mobile_no'), ['class' => 'form-control','id'=>'m_mobile_no']) !!}
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
                            <th>Name</th><th>Mobile</th><th>Email</th><th>Select</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admission as $item)
                            <tr>

                                <td>{{ $item->student_name }}</td>
                                <td>{{ $item->mobile_no }}</td>
                                <td>{{ $item->email }}</td>
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
