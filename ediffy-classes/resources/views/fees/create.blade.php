@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Fees</div>
                    <div class="panel-body">
                        <a href="{{ url('/fees') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/fees', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('fees.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('fees.modal')
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#receipt_date').datepicker({format:"yyyy-mm-dd"}).datepicker("setDate",new Date());
            $('#cheque_date').datepicker({format:"yyyy-mm-dd"});
            $('#student_name').dblclick(function(){$('#myModal').modal('show');});
            $('#modalSubmit').click(function(e){
                e.preventDefault();
                var data = $('#modalForm').serialize();
                $.ajax({
                    type:"GET",
                    url: "{{env('APP_URL')}}/admission-list",
                    data:data,
                    success:function(resp){
                        $('#modalTable > tbody').html('');
                        if(resp.length > 0){
                            $.each(resp,function(key,val){

                                var email = (val.email != undefined)?val.email:'';

                                var html = "<tr> <td>"+val.student_name+"</td> " +
                                        "<td>"+val.mobile_no+"</td><td>"+email+"</td>" +
                                        "<td><input type='radio' class='modalradio' name='student' value='"+val._id+"'></td></tr>";
                                $('#modalTable > tbody').append(html)

                            });
                        }else{
                            var html = "<tr> <td colspan='5'>No User Found</td></tr>";
                            $('#modalTable > tbody').append(html)
                        }

                    }
                });
            });
            $('body').on('change','.modalradio',function(){
                var val = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{env('APP_URL')}}/get-fees-details",
                    data:{val:val},
                    success:function(resp){
                        $('#admission_id').val(resp.adms._id)
                        $('#student_name').val(resp.adms.student_name);
                        $('#course_fees').val(resp.tf);
                        $('#fees_balance').val(resp.rb)
                        $('#installment_amount').val(resp.latestInstallment.amount);
                        $('#received_amount').val(resp.latestInstallment.amount);
                        $('#last_installment').val((resp.ls)?resp.ls.due_date:'');
                        $('#myModal').modal('toggle')
                    }
                });
            });
        })
    </script>
@endsection