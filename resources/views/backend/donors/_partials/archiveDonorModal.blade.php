<div class="modal fade" id="archiveDonorModal{!! $donor->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('donor.archive', $donor->id))) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{!! trans('donors.marchive_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('donors.marchive_description') !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('donors.marchive_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-archive"></i> {!! trans('donors.marchive_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

