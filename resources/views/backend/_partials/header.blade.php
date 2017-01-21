<header class="main-header">
    <a href="{!! url('/') !!}" class="logo">
        <span class="logo-mini"><i class="fa fa-heart"></i></span>
        <span class="logo-lg"><b><i class="fa fa-heart"></i> {!! settings('site_name') !!}</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">



                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{!! auth()->user()->fullName !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">

                            <p>
                                {!! auth()->user()->fullName !!}
                                <small>{!! trans('header.bloodtype') !!}
                                    : {!! auth()->user()->bloodType->name !!}</small>
                            </p>
                        </li>
                        <li class="user-body">

                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('profile.edit') !!}" class="btn btn-default btn-flat"><i
                                            class="fa fa-user"></i> {!! trans('header.profile') !!}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('auth.logout') !!}" class="btn btn-default btn-flat"><i
                                            class="fa fa-close"></i> {!! trans('header.logout') !!}</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>