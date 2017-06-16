@extends('layouts.master')

@section('content')
    <style>
        .red{
            background-color: red;
            border: 1px solid #fff;
            color: #fff;
        }
    </style>
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Fees</div>
                    <div class="panel-body">
                        <div class="row">
                             <div class="col-md-3">
                                 <a href="{{ url('/fees/create') }}" class="btn btn-success btn-sm" title="Add New Fees">
                                     <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                 </a>
                             </div>
                            <div class="col-md-3">
                                {{ Form::open(['method'=>'GET','id'=>'rform'])  }}
                                    {{ Form::select('paid',['paid'=>'Paid','unpaid'=>'Unpaid'],request()->get('paid'),['class'=>'form-control','placeholder'=>'Select','id'=>'paid']) }}
                                {{ Form::close() }}
                            </div>
                        </div>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Student Name</th><th>Amount</th><th>Date</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fees as $item)
                                    <tr class="{{ ($item->paid == 0)?'red':'' }}">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->admission->student_name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->due_date }}</td>
                                        @if($item->paid == 1)
                                            <td>Paid</td>
                                        @else
                                            <td>Unpaid</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $fees->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#paid').change(function(){
                $('#rform').submit();
            })
        })
    </script>
@endsection
