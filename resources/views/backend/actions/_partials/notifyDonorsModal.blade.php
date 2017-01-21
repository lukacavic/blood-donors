<div class="modal fade" id="notifyDonorsModal{!! $action->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('actions.notify', $action->id))) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell"></i> {!! trans('actions.msms_title') !!}</h4>
            </div>
            <div class="modal-body">

                <p>{!! trans('actions.msms_description') !!} </p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('actions.msms_no') !!}</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {!! trans('actions.msms_yes') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

