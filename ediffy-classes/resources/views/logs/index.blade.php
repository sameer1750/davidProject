@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Logs</div>
                    <div class="panel-body">
                      <div class="row">
                        {{ Form::open(['method'=>'GET','id'=>'filterForm']) }}
                        <div class="col-md-3">
                          {{ Form::select('center_id',$centers,request()->get('center_id'),['class'=>'form-control formchange','placeholder'=>'Select Center']) }}
                        </div>
                        <div class="col-md-3">
                            {!! Form::text('date', request()->get('date'), ['class' => 'form-control formchange','id'=>'date','placeholder'=>'Select Date']) !!}
                        </div>
                        {{ Form::close() }}
                      </div>

                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Date</th><th>Module</th><th>Action</th>
                                        <th>User Name</th><th>Audit Log</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $log)
                                      <tr>
                                        <td>
                                          {{ $log->event_created_at }}
                                        </td>
                                        <td>
                                          {{ ucfirst(strtolower($log->module)) }}
                                        </td>
                                        <td>
                                          {{ $log->action }}
                                        </td>
                                        <td>
                                          {{ $log->user->first_name.' '.$log->user->last_name }}
                                        </td>
                                        <td>
                                          {{ $log->log_text }}
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script>
      $(document).ready(function () {
        $('.formchange').change(function () {
          $('#filterForm').submit()
        })
        $('#date').daterangepicker();

      })
  </script>
@endsection
