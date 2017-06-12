@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Enquiry</div>
                    <div class="panel-body">
                        <a href="{{ url('/enquiry/create') }}" class="btn btn-success btn-sm" title="Add New Enquiry">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ url('/quick-inquiry') }}" class="btn btn-success btn-sm" title="Add New Enquiry">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Quick Enquiry
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr><th>Student Name</th><th>Father Name</th><th>Mother Name</th><th>Actions</th><th>
                                            {!! Form::open([
                                              'method'=>'DELETE',
                                              'url' => ['/enquiry-bulk-delete'],
                                              'style' => 'display:inline'
                                          ]) !!}
                                            {{Form::checkbox('select_all','',false,['id'=>'select_all'])}}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                       'type' => 'submit',
                                                       'class' => 'btn btn-danger btn-xs',
                                                       'title' => 'Delete Enquiry',
                                                       'onclick'=>'return confirm("Confirm delete?")'
                                               )) !!}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enquiry as $item)
                                    <tr>

                                        <td>{{ $item->student_name }}</td><td>{{ $item->father_name }}</td><td>{{ $item->mother_name }}</td>
                                        <td>
                                            <a href="{{ url('/enquiry/' . $item->id) }}" title="View Enquiry"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            {{--<a href="{{ url('/enquiry/' . $item->id . '/edit') }}" title="Edit Enquiry"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                                        </td>
                                        <td>  {{Form::checkbox('ids[]',$item->id)}}

                                            </td>
                                    </tr>
                                @endforeach
                                {!! Form::close() !!}
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $enquiry->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3" style="border: 1px solid #ddd;padding: 10px;">
                Filter Criteria
                {{Form::open(['method'=>'GET'])}}
                <div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
                    {!! Form::label('student_name', 'Student Name', ['class' => 'control-label']) !!}
                    {!! Form::text('student_name', request()->get('student_name'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group {{ $errors->has('enquiry_course') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_course', 'Enquiry Course', ['class' => 'control-label']) !!}
                    {!! Form::select('enquiry_course', $course, request()->get('enquiry_course'), ['class' => 'form-control','placeholder'=>'Select Course']) !!}
                </div>
                <?php
                $joinChances = [
                        'YES'=>'Yes',
                        'NO'=>'No',
                        'MAYBE'=>'Maybe'
                ];
                ?>
                <div class="form-group {{ $errors->has('joining_chances') ? 'has-error' : ''}}">
                    {!! Form::label('joining_chances', 'Joining Chances', ['class' => 'control-label']) !!}
                    {!! Form::select('joining_chances', $joinChances, request()->get('joining_chances'), ['class' => 'form-control','placeholder'=>'Joining Chances']) !!}
                </div>

                <div class="form-group {{ $errors->has('enquiry_source') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_source', 'Enquiry Source', ['class' => 'control-label']) !!}
                    {!! Form::select('enquiry_source', $enquirySource, request()->get('enquiry_source'), ['class' => 'form-control','placeholder'=>'Enquiry Source']) !!}
                </div>
                <div class="form-group {{ $errors->has('enquiry_date') ? 'has-error' : ''}}">
                    {!! Form::label('enquiry_date', 'Enquiry Date', ['class' => 'control-label']) !!}
                    {!! Form::text('enquiry_date', request()->get('enquiry_date'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group {{ $errors->has('job_required') ? 'has-error' : ''}}">
                    {!! Form::label('job_required', 'Job Required', ['class' => 'control-label']) !!}
                    {!! Form::select('job_required',['YES'=>'YES','NO'=>'NO'], request()->get('job_required'), ['class' => 'form-control','placeholder'=>'Job Required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Apply Filter', ['class' => 'btn btn-primary btn-sm']) !!}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#select_all").change(function () {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
            $('#enquiry_date').daterangepicker({
                opens: 'left'
            })
        })
    </script>
@endsection
