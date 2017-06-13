<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edify Admin @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/bower_components/admin-lte/plugins/datepicker/datepicker3.css">
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
          type="text/css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" type="text/css"  rel="stylesheet" >
    <!-- iCheck -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{env('APP_URL')}}/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.js"></script>

    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    @if(Auth::user())
        @include('layouts.nav')
        @include('layouts.sidebar')
    @endif

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">



        <!-- Main content -->
        <section class="content">
            @include('layouts.errors')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')
    @include('layouts.right-sidebar')

            <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class='control-sidebar-bg'></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script>--}}
{{--$.widget.bridge('uibutton', $.ui.button);--}}
{{--</script>--}}
<!-- Bootstrap 3.3.2 JS -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/bower_components/moment/min/moment.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/bower_components/html5formshim/src/h5formshim.js" type="text/javascript"></script>

<!-- Sparkline -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"
        type="text/javascript"></script>
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"
        type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"
        type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='{{env('APP_URL')}}/bower_components/admin-lte/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="{{env('APP_URL')}}/bower_components/admin-lte/dist/js/app.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="{{env('APP_URL')}}/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{env('APP_URL')}}/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>

@yield('scripts')
</body>
</html>

