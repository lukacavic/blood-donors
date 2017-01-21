@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/timepicker/bootstrap-timepicker.min.css') !!}
@stop

@section('content')

    <section class="content-header">
        <h1>
            {!! trans('actions.title_add') !!}
        </h1>

    </section>

    <section class="content">

        <div class="box">

            {!! Form::open(['route' => ['actions.add']]) !!}

            <div class="box-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('code', trans('actions.form_code')) !!}
                            {!! Form::text('code', settings('actions_prefix').'/'.Carbon\Carbon::now()->year.'/', ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            {!! Form::label('name', trans('actions.form_name')) !!}
                            {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('status', trans('actions.form_status')) !!}
                            {!! Form::select('status', config('global.ACTION_STATUS'), null, ['class'=>'form-control select2','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            {!! Form::label('location', trans('actions.form_location')) !!}
                            {!! Form::text('location', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('date', trans('actions.form_date')) !!}
                    {!! Form::date('date', \Carbon\Carbon::now(), ['class'=>'form-control','required']) !!}
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                {!! Form::label('startTime', trans('actions.form_starttime')) !!}
                                <input type="text" name="startTime" class="form-control startTime">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                {!! Form::label('endTime', trans('actions.form_endtime')) !!}
                                <input type="text" name="endTime" class="form-control endTime">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', trans('actions.form_note')) !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>3]) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {!! trans('actions.form_add') !!}</button>
            </div>

            {!! Form::close() !!}

        </div>

    </section>

@stop

@section('scripts')
    {!! Html::script('plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <script>
        $(function () {
            //Timepicker
            $(".startTime").timepicker({
                showInputs: false,
                showMeridian: false,
                maxHours: 24,
                defaultTime: '16:00'
            });
            $(".endTime").timepicker({
                showInputs: false,
                showMeridian: false,
                maxHours: 24,
                defaultTime: '18:00'
            });
        });
    </script>
@stop