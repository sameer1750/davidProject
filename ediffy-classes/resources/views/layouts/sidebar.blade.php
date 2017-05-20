<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>--}}
            {{--</div>--}}
            {{--<div class="info">--}}
                {{--<p>{{ Auth::user()->first_name." ".Auth::user()->last_name }}</p>--}}

                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
             @include('layouts.admin-sidebar')
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
