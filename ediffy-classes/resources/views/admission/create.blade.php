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
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var courseData = [];

            $('.datepicker').datepicker({
                autoclose:true,
                format:"yyyy-mm-dd",
                endDate:"0d"

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
                        url:"/get-student",
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

            $("#search-name").select2({
                ajax: {
                    url: "/get-students-details",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.items
                        };
                    },
                    cache: true
                },
                allowClear: true,
                placeholder:"Search By Name or Aadhaar Card No.",
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });
            $('.generalSelect2').select2();

            $('body').on('click','#addCourse',function(){
                var course_id = $('#course_name').val();
                var courseText = $('#course_name').find('option:selected').text();
                var module_id = $('input[name=course_module]:checked').val();

                if(!module_id){
                    alert('Please select a module first');
                }
                if(checkAndAdd(courseData,course_id)){
                    alert('Course Already Added!!');
                    return;
                }
                var moduleText = $('input[name=course_module]:checked').next('span').text();
                var fees = $('#course_fees').val();
                var totalFees = parseInt($('#total_fees').val()) + parseInt(fees);

                $('#total_fees').val(totalFees);
                var tempObj = {};
                tempObj['module_id'] = module_id;
                tempObj['course_id'] = course_id;
                courseData.push(tempObj);

                var html = '<div class="row"><div class="col-md-3">'+courseText+'</div>' +
                        '<div class="col-md-3">'+moduleText+'</div><div class="col-md-3">'+fees+'</div>' +
                        '<div class="col-md-3"><span onclick="removeC()" data-fees="'+fees+'" data-course-id="'+course_id+'" data-module-id="'+module_id+'" class="btn btn-danger btn-xs">rem</span></div></div>';
                $('#cms').append(html);
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

                $(event.currentTarget).parent().parent('.row').remove();
            };

            $('#preferred_batch').change(function(){
                var val = $(this).val();
                var courseId = $('#course_name').find('option:selected').val();
                $.ajax({
                    type:"GET",
                    url:"/get-batch-details",
                    data: {
                        batch_id: val,
                        course_id: courseId
                    },
                    success:function(resp){
                        $('#se_avail').val('Total Seats : '+resp.max_students+' Seats Available :'+resp.avail);
                    }
                });
            });

            $('#course_name').change(function(){
                $('#cm').html('')
                var val = $(this).val();
                if(val){
                    $.ajax({
                        type:"GET",
                        url:"/get-course",
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
        });
    </script>
@endsection