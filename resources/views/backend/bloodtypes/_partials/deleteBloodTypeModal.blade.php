<div class="modal fade" id="deleteBloodTypeModal{!! $bloodType->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('blood-types.delete', $bloodType->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> {!! trans('bloodtypes.mdelete_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('bloodtypes.mdelete_description') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('bloodtypes.mdelete_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {!! trans('bloodtypes.mdelete_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

