<div class="modal fade" id="changeDonorRole{!! $donor->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('donor.change-role', $donor->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i
                            class="fa fa-reorder"></i> {!! trans('donors.mrole_title') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('role', trans('donors.mrole_roles')) !!}
                            {!! Form::select('role[]', $roles,  null,['class'=>'form-control select2','style'=>'width:100%;','multiple']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('administrator', 'Super Administrator') !!}
                            {!! Form::select('administrator', [0=>'No',1=>'Yes'],  $donor->administrator,['class'=>'form-control select2','style'=>'width:100%;']) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">{!! trans('donors.mrole_no') !!}</button>
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-check"></i> {!! trans('donors.mrole_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

