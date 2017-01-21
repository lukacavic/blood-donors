@extends('backend.settings.layouts.master')

@section('settings-content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-shield"></i>
            <h3 class="box-title">{!! trans('roles.title') !!}</h3>
        </div>
        <div class="box-body">

            <table id="roles" class="table table-hover table-bordered table-responsive">
                <thead>
                <tr>
                    <th>{!! trans('roles.table_name') !!}</th>
                    <th>{!! trans('roles.table_slug') !!}</th>
                    <th>{!! trans('roles.table_permissions') !!}</th>
                    <th>{!! trans('roles.table_donors') !!}</th>
                    <th>{!! trans('roles.table_actions') !!}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($roles as $role)

                    <tr>
                        <td><a href="{!! route('role',$role->id) !!}"><strong>{!! $role->role_title!!}</strong></a></td>
                        <td>{!! $role->role_slug !!}</td>
                        <td>{!! $role->permissions->count() !!}</td>
                        <td>{!! $role->donors->count() !!}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{!! route('role', $role->id) !!}" type="button"
                                   class="btn btn-default btn-flat btn-xs"> {!! trans('roles.table_view') !!}</a>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle btn-xs"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @can('edit-role')
                                    <li><a href="#" data-toggle="modal"
                                           data-target="#editRole{!! $role->id !!}"><i
                                                    class="fa fa-edit"></i> {!! trans('roles.table_edit') !!}</a></li>
                                    @endcan
                                    @can('delete-role')
                                    <li class="divider"></li>
                                    <li><a href="#" data-toggle="modal"
                                           data-target="#deleteRole{!! $role->id !!}"><i
                                                    class="fa fa-trash"></i> {!! trans('roles.table_delete') !!}</a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </td>
                    </tr>

                    @include('backend.settings._partials.editRole')
                    @include('backend.settings._partials.deleteRole')

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop