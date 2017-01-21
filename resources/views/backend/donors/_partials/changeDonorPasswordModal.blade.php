<div class="modal fade" id="changeDonorPasswordModal{!! $donor->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => array('donor.change-password', $donor->id))) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-key"></i> {!! trans('donors.mpassword_title') !!}</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="password">{!! trans('donors.mpassword_password') !!}</label>
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{!! trans('donors.mpassword_password_confirmation') !!}</label>
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('donors.mpassword_no') !!}</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> {!! trans('donors.mpassword_yes') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

