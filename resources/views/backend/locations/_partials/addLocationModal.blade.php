<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => ['location.add']]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> {!! trans('locations.add_title') !!}</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('code', trans('locations.form_code')) !!}
                            {!! Form::text('code', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name', trans('locations.form_name')) !!}
                            {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', trans('locations.form_description')) !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>2]) !!}
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('locations.add_close') !!}</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {!! trans('locations.add_save') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

