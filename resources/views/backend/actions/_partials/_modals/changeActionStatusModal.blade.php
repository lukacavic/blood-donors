<div class="modal fade" id="changeActionStatus{!! $action->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('action.status', $action->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> {!! trans('actions.mstatus_title') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">{!! trans('actions.mstatus_description') !!}</label>
                    {!! Form::select('status', config('global.ACTION_STATUS'),null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('actions.mstatus_no') !!}</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {!! trans('actions.mstatus_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

