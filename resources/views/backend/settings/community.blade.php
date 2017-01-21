@extends('backend.settings.layouts.master')

@section('settings-content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-institution"></i>
            <h3 class="box-title">{!! trans('settings.community_title') !!}</h3>
        </div>
        {!! Form::open(['route' => 'settings', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('community_name',trans('settings.community_name')) !!}
                {!! Form::text('community_name', settings('community_name'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('community_slogan',trans('settings.community_slogan')) !!}
                {!! Form::textarea('community_slogan', settings('community_slogan'), ['class'=>'form-control','rows'=>2]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('community_description',trans('settings.community_description')) !!}
                {!! Form::textarea('community_description', settings('community_description'), ['class'=>'form-control','rows'=>2]) !!}
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        {!! Form::label('community_logo',trans('settings.community_logo')) !!}
                        {!! Form::file('community_logo', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    {!! Html::image('images/avatars/default.png','',['class'=>'img-circle pull-right','width'=>60]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('community_leader',trans('settings.community_leader')) !!}
                {!! Form::text('community_leader', settings('community_leader'), ['class'=>'form-control']) !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('community_subleader1',trans('settings.community_subleader1')) !!}
                        {!! Form::text('community_subleader1', settings('community_subleader1'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('community_subleader2',trans('settings.community_subleader2')) !!}
                        {!! Form::text('community_subleader2', settings('community_subleader2'), ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('community_subleader3',trans('settings.community_subleader3')) !!}
                        {!! Form::text('community_subleader3', settings('community_subleader3'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('community_subleader4',trans('settings.community_subleader4')) !!}
                        {!! Form::text('community_subleader4', settings('community_subleader4'), ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('community_phone',trans('settings.community_phone')) !!}
                {!! Form::text('community_phone', settings('community_phone'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('community_website',trans('settings.community_website')) !!}
                {!! Form::text('community_website', settings('community_website'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('community_email',trans('settings.community_email')) !!}
                {!! Form::text('community_email', settings('community_email'), ['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">{!! trans('settings.save') !!}</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop