@extends('backend.layouts.master')

    <style>

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            background-color: #FFFFFF;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #333;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #c50b08;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #ffffff;
            background-color: #dd4b39;
            border-left: 2px solid #d73925;
            margin-left: -2px;
        }

    </style>

@section('content')
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    {!! trans('settings.title') !!}
                </h3>
            </div>

        </div>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-usermenu">
                    <ul class="nav">

                        <li class="{!! (Request::is('settings/general') ? 'active' : '') !!}">
                            <a href="{!! route('settings.general') !!}">
                                <i class="fa fa-home"></i> {!! trans('settings.menu_general') !!} </a>
                        </li>

                        <li class="{!! (Request::is('settings/community') ? 'active' : '') !!}">
                            <a href="{!! route('settings.community') !!}">
                                <i class="fa fa-institution"></i> {!! trans('settings.menu_community') !!} </a>
                        </li>
                        <li class="{!! (Request::is('settings/roles') ? 'active' : '') !!}">
                            <a href="{!! route('settings.roles') !!}">
                                <i class="fa fa-shield"></i> {!! trans('settings.menu_roles') !!} </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @yield('settings-content')
            </div>
        </div>
    </section>
@stop

