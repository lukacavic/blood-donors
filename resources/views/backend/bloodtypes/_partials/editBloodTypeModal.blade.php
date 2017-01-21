<div class="modal fade" id="editBloodTypeModal{!! $bloodType->id !!}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => ['blood-types.edit',$bloodType->id]]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> {!! trans('bloodtypes.edit_title') !!}</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('code', trans('bloodtypes.form_code')) !!}
                            {!! Form::text('code', $bloodType->code, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name', trans('bloodtypes.form_name')) !!}
                            {!! Form::text('name', $bloodType->name, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', trans('bloodtypes.form_description')) !!}
                            {!! Form::textarea('description', $bloodType->description, ['class'=>'form-control','rows'=>2]) !!}
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('bloodtypes.edit_close') !!}</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {!! trans('bloodtypes.edit_save') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

