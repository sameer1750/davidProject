@extends('layouts.login')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @include('layouts.errors')

        {!! Form::open() !!}
        <div class="form-group has-feedback">

            {!! Form::Email('email',null,['class'=>'form-control', 'placeholder'=>'Email']) !!}

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">

            {!! Form::input('password','password',null,['class'=>'form-control', 'placeholder'=>'Password']) !!}

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {!! Form::checkbox('remember') !!} Remember Me

                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">

                {!! Form::submit('Sign In',['class'=>'btn btn-primary btn-block btn-flat']); !!}
            </div>
            <!-- /.col -->
        </div>
        {!! Form::close() !!}

    </div>
@endsection
