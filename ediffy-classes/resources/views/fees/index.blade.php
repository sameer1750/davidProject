@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Fees</div>
                    <div class="panel-body">
                        <a href="{{ url('/fees/create') }}" class="btn btn-success btn-sm" title="Add New Fees">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Student Name</th><th>Amount</th><th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fees as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->admission->student_name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->due_date }}</td>
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
