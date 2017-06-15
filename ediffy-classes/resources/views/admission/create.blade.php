@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Admission</div>
                    <div class="panel-body">
                        <a href="{{ url('/admission') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admission', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admission.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admission.modal')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var courseData = [];
            var ttFees = 0;
            $('.datepicker').datepicker({
                autoclose:true,
                format:"yyyy-mm-dd",
                endDate:"0d"

            });
            $('#completionDate').datepicker({
                autoclose:true,
                format:"yyyy-mm-dd"
            });
            function formatRepo (repo) {
                if (repo.loading) return repo.text;

                var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.student_name + "</div>";

                return markup;
            }

            function formatRepoSelection (repo) {
                return repo.student_name;
            }

            $('#search-name').change(function(){
                var val = $(this).val();
                if(val){
                    $.ajax({
                        type:"GET",
                        url:"{{env('APP_URL')}}/get-student",
                        data:{val:val},
                        success:function(resp){
                            $.each(resp,function(key,val){
                                $('#'+key).val(val);
                            });
                        }
                    });
                }else{
                    $('#cm').html('');
                    $('#cms').html('');
                    var courseData = [];
                    $(':input').val('')
                }
            });

            $('#student_name').dblclick(function(){$('#myModal').modal('show');});

            $('.generalSelect2').select2();

            $('body').on('click','#addCourse',function(){
                var course_id = $('#course_name').val();
                var batch_id = $('#preferred_batch').find('option:selected').val();
                if(!batch_id){
                    alert('Please Select Course,Module & Preferred Batch!!');
                    return;
                }
                if(checkAndAdd(courseData,course_id)){
                    alert('Course Already Added!!');
                    return;
                }
                var module_id = $('input[name=course_module]:checked').val();
                var courseText = $('#course_name').find('option:selected').text();
                var moduleText = $('input[name=course_module]:checked').next('span').text();
                var batchText = $('#preferred_batch').find('option:selected').text();
                var fees = $('#course_fees').val();
                var currentFees = parseInt($('#total_fees').val());
                if(!currentFees){
                    currentFees = 0;
                }
                var totalFees = currentFees + parseInt(fees);

                $('#total_fees').val(totalFees);
                ttFees = totalFees;
                $('#total_fees_inc_tax').val(totalFees);

                var tempObj = {};
                tempObj['module_id'] = module_id;
                tempObj['course_id'] = course_id;
                tempObj['batch_id'] = batch_id;
                courseData.push(tempObj);

                var html = '<div class="row"><div class="col-md-3">'+courseText+'</div>' +
                        '<div class="col-md-3">'+moduleText+'</div><div class="col-md-2">'+fees+'</div><div class="col-md-2">'+batchText+'</div>' +
                        '<div class="col-md-2"><span onclick="removeC()" data-fees="'+fees+'" data-course-id="'+course_id+'" data-module-id="'+module_id+'" class="btn btn-danger btn-xs">rem</span></div></div>';
                $('#cms').append(html);
            });

            $('body').on('change','input[name=course_module]',function(){
                var val = $(this).val();
                $.ajax({
                    type:"get",
                    url:"{{env('APP_URL')}}/get-batch-by-module",
                    data:{val:val},
                    success:function(resp){
                        $('#preferred_batch').find('option')
                                .remove()
                                .end();

                        $('#preferred_batch').append('<option value="">Select batch</option>');


                        $.each(resp,function(key,val){
                            $('#preferred_batch')
                                    .append('<option value="'+val.id+'">'+val.full_start_time+'-'+val.full_end_time+'</option>')
                        });

                        console.log(resp)
                    }
                });
            });

            $('#preferred_batch').change(function(){
                var val = $(this).val();
                $('#se_avail').text('');
                var courseId = $('#course_name').find('option:selected').val();
                var moduleId = $('input[name=course_module]:checked').val();
                $.ajax({
                    type:"GET",
                    url:"{{env('APP_URL')}}/get-batch-details",
                    data: {
                        batch_id: val,
                        course_id: courseId,
                        module_id: moduleId
                    },
                    success:function(resp){
                        $('#se_avail').text('Total Seats : '+resp.total+'. Seats Available :'+resp.available);
                    }
                });
            });

            removeC = function(){
                var mid = $(event.currentTarget).data('module-id');
                var fees = parseInt($(event.currentTarget).data('fees'));

                var cid = $(event.currentTarget).data('course-id');
                for(var i = 0; i < courseData.length; i++) {
                    if(courseData[i].course_id == cid) {
                        courseData.splice(i, 1);
                        break;
                    }
                }
                var curFees = parseInt($('#total_fees').val()) - fees;
                $('#total_fees').val(curFees);
                ttFees = curFees;
                $('#total_fees_inc_tax').val(curFees);

                $(event.currentTarget).parent().parent('.row').remove();
            };

            $('#preferred_batch').change(function(){
                var val = $(this).val();
                $('#se_avail').text('');
                var courseId = $('#course_name').find('option:selected').val();
                var moduleId = $('input[name=course_module]:checked').val();
                $.ajax({
                    type:"GET",
                    url:"{{env('APP_URL')}}/get-batch-details",
                    data: {
                        batch_id: val,
                        course_id: courseId,
                        module_id: moduleId
                    },
                    success:function(resp){
                        $('#se_avail').text('Total Seats : '+resp.total+'. Seats Available :'+resp.available);
                    }
                });
            });

            $('#course_name').change(function(){
                $('#cm').html('')
                var val = $(this).val();
                if(val){
                    $.ajax({
                        type:"GET",
                        url:"{{env('APP_URL')}}/get-course",
                        data:{id:val},
                        success:function(resp){
                            $('#duration').val(resp.Duration);
                            $('#course_fees').val(resp.default_fees);
                            $('#completionDate').val(resp.course_completion)
                            $.each(resp.modules,function(key,value){
                                var html = '<div class="checkbox"><label><input name="course_module" type="radio" value="'+value.id+'"><span>'+value.name+'</span></label></div>';
                                $('#cm').append(html);
                            })
                        }
                    });
                }else{
                    $('#duration').val('');
                    $('#course_fees').val('');
                    $('#completionDate').val('')
                }

            });
            $('form').submit(function(e){
                $('<input />').attr('type', 'hidden')
                        .attr('name', "selected_course")
                        .attr('value', JSON.stringify(courseData))
                        .appendTo(this);
                return true;
            });

            function checkAndAdd(arr,courseId) {
                var found = arr.some(function (el) {
                    return el.course_id === courseId;
                });
                return found;
            }

            $("#image").change(function(){
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#modalSubmit').click(function(e){
                e.preventDefault();
                var data = $('#modalForm').serialize();
                $.ajax({
                    type:"GET",
                    url: "{{env('APP_URL')}}/inquiry-list",
                    data:data,
                    success:function(resp){
                        $('#modalTable > tbody').html('');
                        if(resp.length > 0){
                            $.each(resp,function(key,val){

                                var aadhaarNo = (val.aadhaar_card_no != undefined)?val.aadhaar_card_no:'';
                                var email = (val.email != undefined)?val.email:'';
                                var enquiry_on = (val.inquiry_date != undefined)?val.inquiry_date:val.created_at;

                                var html = "<tr> <td>"+val.student_name+"</td> " +
                                        "<td>"+aadhaarNo+"</td> <td>"+val.mobile_no+"</td><td>"+email+"</td>" +
                                        "<td>"+val.enquiry_source+"</td><td>"+enquiry_on+"</td> <td><input type='radio' class='modalradio' name='student' value='"+val._id+"'></td></tr>";
                                $('#modalTable > tbody').append(html)

                            });
                        }else{
                            var html = "<tr> <td colspan='5'>No User Found</td></tr>";
                            $('#modalTable > tbody').append(html)
                        }

                    }
                });
            });

            $(':radio[name="apply_tax"]').change(function(){
                var val = $(this).filter(':checked').val();
                if(val == 'yes'){
                    $('.taxType').removeAttr('disabled');
                }else{
                    $('.taxType').attr('disabled','disabled');
                    var tFees = $('#total_fees').val();
                    $('#total_fees_inc_tax').val(tFees);
                    $(".taxType").prop('checked', false);
                    $('#tax_amt').val(0)
                }
            });

            $('body').on('keyup','#discount',function(){
                var disType = $(this).parent().next('div').children('select').find(':selected').val();
                var val = parseInt($(this).val());
                if(isNaN(val) || val == 0){
                    $('#total_fees').val(ttFees);
                }else{
                    if(disType == 'PERCENT'){
                        var discount = (ttFees * val) / 100;
                        $('#total_fees').val(ttFees-discount);
                        $('#total_fees_inc_tax').val(ttFees-discount);
                    }else{
                        var discount = ttFees - val;
                        $('#total_fees').val(discount);
                        $('#total_fees_inc_tax').val(discount);
                    }
                }
            });

            $('#no_of_installment').keyup(function(){

                var val = parseInt($(this).val());
                var fees = parseFloat($('#total_fees_inc_tax').val()) - parseFloat($('#down_payment').val());
                var eachInstallment = Math.floor(fees / val);
                var te = 0;
                for(var i=1;i<=val;i++){
                    if(i == val){
                        eachInstallment = fees - te;
                    }else{
                        te += eachInstallment;
                    }
                    var html = ' <div class="row"> ' +
                            '<div class="col-md-2"><b>'+i+'</b></div> ' +
                            '<div class="col-md-5"><b>'+moment().add(i,'months').format('YYYY-MMM-D')+'</b></div> ' +
                            '<div class="col-md-5"><b>'+eachInstallment+'</b></div> ' +
                            '</div>';
                    $('#installments').append(html);
                }
            });

            $('.taxType').click(function(){
                var val = $(this).val();
                var taxMethod = $('#tax_method').find(':selected').val();

                if($(this).is(':checked')){
                    if(taxMethod == 'EXCLUSIVE'){
                        var tFees = $('#total_fees').val();
                        var tIFees = parseFloat($('#total_fees_inc_tax').val());
                        var newPercent = (tFees * val) / 100;
                        var newTFees = parseFloat(newPercent) + tIFees;
                        $('#total_fees_inc_tax').val(newTFees);
                        var taxAmt = parseFloat($('#tax_amt').val()) + parseFloat(newPercent);
                        $('#tax_amt').val(taxAmt)
                    }else{

                        var tFees = $('#total_fees').val();
                        var tIFees = parseFloat($('#total_fees_inc_tax').val());
                        var newPercent = (tFees * val) / 100;
                        var newTFees = tFees - parseFloat(newPercent) ;
                        $('#total_fees').val(newTFees);
                        var taxAmt = parseFloat($('#tax_amt').val()) + parseFloat(newPercent);
                        $('#tax_amt').val(taxAmt)
                    }
                }else{
                    if(taxMethod == 'EXCLUSIVE'){
                        var tFees = $('#total_fees').val();
                        var tIFees = parseFloat($('#total_fees_inc_tax').val());
                        var newPercent = (tFees * val) / 100;
                        var newTFees = tIFees - parseFloat(newPercent);
                        $('#total_fees_inc_tax').val(newTFees)
                        var taxAmt = parseFloat($('#tax_amt').val()) - parseFloat(newPercent);
                        $('#tax_amt').val(taxAmt)
                    }else{

                    }
                }
            });

            $('body').on('change','.modalradio',function(){
                var val = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{env('APP_URL')}}/get-student",
                    data:{val:val},
                    success:function(resp){
                        $('#inquiry_id').val(resp._id);
                        $.each(resp,function(key,val){
                            $('#'+key).val(val);
                        });
                        $('#myModal').modal('toggle')
                    }
                });
            });


            $('#addDiscount').click(function(){
                $('#cloneDiv').append('<div class="col-md-offset-4 col-md-2"> ' +
                        '<input class="form-control" name="discount" type="number" id="discount"> ' +
                        '</div> <div class="col-md-2"> ' +
                        '<select class="form-control" id="discount_type" name="discount_type"><option value="PERCENT">PERCENT</option><option value="RUPEES">RUPEES</option></select> ' +
                        '</div>')
            });
        });
    </script>
@endsection
