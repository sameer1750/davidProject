@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New SalaryDetail</div>
                    <div class="panel-body">
                        <a href="{{ url('/salary-details') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/salary-details', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('salary-details.form')

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
            $('#applicable_from_date').datepicker({
                format:"yyyy-mm-dd"
            });

            $('#employee_id').select2({
                "placeholder":"Select Employee"
            });

            $('#employee_id').change(function(){
                var val = $(this).find(':selected').val();
                $.ajax({
                    type:"GET",
                    url:"{{ env('APP_URL') }}/emp-salary-detail",
                    data:{id:val},
                    success:function(resp){
                        $.each(resp,function(key,val){
                            $('#'+key).val(val)
                        })
                    }
                });
            });
        });
    </script>
@endsection