<div class="modal fade" id="donorCommingToAction" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('action.donor.comming', $action->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i
                            class="fa fa-check"></i> {!! trans('actions.mcomming_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p></p>
                <div class="form-group">
                    <label for="type">{!! trans('actions.mcomming_description') !!}</label>
                    {!! Form::select('type', [config('global.ACTION_COMMING')=>trans('actions.yes'), config('global.ACTION_NOT_COMMING')=>trans('actions.no')], 1, ['class'=>'form-control ']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">{!! trans('actions.mcomming_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i
                            class="fa fa-check"></i> {!! trans('actions.mcomming_yes') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

