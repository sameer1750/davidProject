<header class="main-header" >
    <!-- Logo -->
    <a href="/dashboard/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->

        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Ediffy Classes</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"  role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{--<img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="user-image"--}}
                             {{--alt="User Image"/>--}}
                        <span class="hidden-xs">{{ Auth::user()->first_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            {{--<img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle"--}}
                                 {{--alt="User Image"/>--}}
                            <p>
                                {{ Auth::user()->email }}
                                <small>Member since {{ date('F d, Y', strtotime(Auth::user()->created_at)) }} </small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                {!! Form::open(['route' => 'logout', 'method' =>'POST']) !!}
                                    {!! Form::submit('logout',['class'=>'btn btn-default btn-flat']) !!}
                                {!!Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>