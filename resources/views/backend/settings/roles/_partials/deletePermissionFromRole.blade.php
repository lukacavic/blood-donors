<div class="modal fade" id="removePermissionFromRole{!! $permission->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => ['role.permission.remove', $role->id,$permission->id])) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{!! trans('roles.rpdelete_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('roles.rpdelete_description') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> {!! trans('roles.rpdelete_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {!! trans('roles.rpdelete_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

