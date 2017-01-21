<div class="modal fade" id="questionCommingToAction" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('action.question', $action->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> {!! trans('actions.mquestion_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('actions.mquestion_description') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('actions.mquestion_no') !!}</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {!! trans('actions.mquestion_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

