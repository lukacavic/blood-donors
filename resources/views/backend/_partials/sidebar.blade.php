<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info" style="padding-top:15px;">
                <p>{!! auth()->user()->fullName !!}</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview {!! (Request::is('dashboard') ? 'active' : '') !!}">
                <a href="{!! route('dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>{!! trans('sidebar.dashboard') !!}</span>
                </a>
            </li>
            @can('show-donors')
                <li class="treeview {!! (Request::is('donors') ? 'active' : '') !!}">
                    <a href="{!! route('donors') !!}"><i class="fa fa-users"></i><span>{!! trans('sidebar.donors') !!}</span></a>
                </li>
            @endcan

            @can('show-actions')
                <li class="treeview {!! (Request::is('actions') ? 'active' : '') !!}">
                    <a href="{!! route('actions') !!}"><i class="fa fa-hospital-o"></i><span>{!! trans('sidebar.actions') !!}</span></a>
                </li>
            @endcan

            @can('show-locations')
                <li class="treeview {!! (Request::is('locations') ? 'active' : '') !!}">
                    <a href="{!! route('locations') !!}"><i class="fa fa-location-arrow"></i><span>{!! trans('sidebar.locations') !!}</span></a>
                </li>
            @endcan

            @can('show-settings')
                <li class="treeview {!! (Request::is('settings/*') ? 'active' : '') !!}">
                    <a href="{!! route('settings.general') !!}"><i class="fa fa-gears"></i><span>{!! trans('sidebar.settings') !!}</span></a>
                </li>
            @endcan
        </ul>
    </section>
</aside>