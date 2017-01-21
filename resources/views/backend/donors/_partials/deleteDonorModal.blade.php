<div class="modal fade" id="deleteDonorModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
            <button type="submit" class="btn btn-primary">Delete</button>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i
                            class="fa fa-trash"></i> {!! trans('donors.mdelete_title') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('donors.mdelete_description') !!}</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">{!! trans('donors.mdelete_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i
                            class="fa fa-trash"></i> {!! trans('donors.mdelete_yes') !!}</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

