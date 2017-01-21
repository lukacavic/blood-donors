<div class="modal fade" id="editRole{!! $role->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => ['role.edit',$role->id]]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> {!! trans('roles.medit_title') !!}
                </h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('role_title', trans('roles.form_name')) !!}
                            {!! Form::text('role_title', $role->role_title, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('role_slug', trans('roles.form_slug')) !!}
                            {!! Form::text('role_slug', $role->role_slug, ['class'=>'form-control','required','disabled']) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">{!! trans('roles.medit_no') !!}</button>
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-check"></i> {!! trans('roles.medit_yes') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

