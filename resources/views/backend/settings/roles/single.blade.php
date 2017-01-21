@extends('backend.settings.layouts.master')

@section('settings-content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-shield"></i>
            <h3 class="box-title">Permissions for role: {!! $role->role_title !!}</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => ['role.permissions',$role->id], 'method' => 'post']) !!}
            <div class="form-group">
                <label for="permissions">Permissions</label>
                {!! Form::select('permissions[]',$permissions, null, ['class'=>'form-control select2',' multiple'=>true]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update permissions',['class'=>'btn btn-success ']) !!}
            </div>
            {!! Form::close() !!}
            <div>
                <h5><strong>Assigned permissions</strong></h5>
                <table id="roles" class="table table-hover table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Permission name</th>
                        <th>Permission slug</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($role->permissions as $permission)

                        <tr>
                            <td>{!! $permission->permission_title !!}</td>
                            <td>{!! $permission->permission_slug !!}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-toggle="modal" data-target="#removePermissionFromRole{!! $permission->id !!}" type="button"
                                       class="badge bg-red"> <i class="fa fa-minus"></i></a>
                                </div>
                            </td>
                        </tr>

                        @include('backend.settings.roles._partials.deletePermissionFromRole')

                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@stop