@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Employee</div>
                    <div class="panel-body">
                        <a href="{{ url('/employee') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/employee', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('employee.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#dob').datepicker({
                format:"yyyy-mm-dd"
            });
            $('#joining_date').datepicker({
                format:"yyyy-mm-dd"
            });
        });
    </script>
@endsection