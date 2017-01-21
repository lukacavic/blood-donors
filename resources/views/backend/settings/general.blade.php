@extends('backend.settings.layouts.master')

@section('styles')
@stop

@section('settings-content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-home"></i>
            <h3 class="box-title">{!! trans('settings.general_title') !!}</h3>
        </div>
        {!! Form::open(['route' => 'settings', 'method' => 'post']) !!}
        <div class="box-body">

            <div class="form-group">
                {!! Form::label('site_name',trans('settings.general_sitename')) !!}
                {!! Form::text('site_name', settings('site_name'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('site_description',trans('settings.general_sitedescription')) !!}
                {!! Form::textarea('site_description', settings('site_description'), ['class'=>'form-control','rows'=>2]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('site_language',trans('settings.general_sitelanguage')) !!}
                {!! Form::select('site_language', [], settings('site_language'), ['class'=>'form-control select2']) !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('site_registrations',trans('settings.general_frontendregistrations')) !!}
                        {!! Form::select('site_registrations', [1=>'Yes',0=>'No'], settings('site_registrations'), ['class'=>'form-control select2']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('default_role',trans('settings.general_default_role')) !!}
                        {!! Form::select('default_role', $roles, settings('default_role'), ['class'=>'form-control select2']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('site_recaptcha',trans('settings.general_enablecaptcha')) !!}
                {!! Form::select('site_recaptcha', [1=>'Yes',0=>'No'], settings('site_recaptcha'), ['class'=>'form-control select2']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('dashboard_topdonor_count',trans('settings.general_counttopdonors')) !!}
                {!! Form::text('dashboard_topdonor_count', settings('dashboard_topdonor_count'), ['class'=>'form-control']) !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('actions_prefix',trans('settings.general_actionsprefix')) !!}
                        {!! Form::text('actions_prefix', settings('actions_prefix'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('country_prefix',trans('settings.general_countryprefix')) !!}
                        {!! Form::text('country_prefix', settings('country_prefix'), ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('avatar_uploads',trans('settings.general_enableavatar')) !!}
                {!! Form::select('avatar_uploads', [1=>'Yes',0=>'No'], settings('avatar_uploads'), ['class'=>'form-control select2']) !!}
            </div>


        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">{!! trans('settings.save') !!}</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
<script>
    $(function () {

    });
</script>
@stop

