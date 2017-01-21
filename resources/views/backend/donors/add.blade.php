@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}
@stop

@section('content')
    <section class="content-header">
        <h1>
            Novi darivatelj
        </h1>
    </section>
    <section class="content">
        <div class="box">
            {!! Form::open(['route' => ['donor.add']]) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('first_name', 'Ime') !!}
                                    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                                    <span class="help-block text-red text-bold">{!! $errors->first('first_name') !!}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('last_name', 'Prezime') !!}
                                    {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                                    <span class="help-block text-red text-bold">{!! $errors->first('last_name') !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('role', trans('donors.form_role')) !!}
                            {!! Form::select('role', $roles, settings('default_role'), ['class'=>'form-control select2']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('role') !!}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('address', 'Adresa') !!}
                                    {!! Form::text('address', null, ['class'=>'form-control']) !!}
                                    <span class="help-block text-red text-bold">{!! $errors->first('address') !!}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('location_id', 'Mjesto') !!}
                                    {!! Form::select('location_id', $locations, null, ['class'=>'form-control select2']) !!}
                                    <span class="help-block text-red text-bold">{!! $errors->first('location_id') !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('sex','Spol') !!}
                            {!! Form::select('sex', config('global.DONOR_SEX'),null, ['class'=>'form-control select2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('username', 'Korisničko ime') !!}
                            {!! Form::text('username', null, ['class'=>'form-control']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('username') !!}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('email') !!}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('mobile', 'Mobitel') !!}
                            {!! Form::text('mobile', null, ['class'=>'form-control','placeholder'=>'385981234567']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('mobile') !!}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('phone', 'Telefon') !!}
                            {!! Form::text('phone', '' , ['class'=>'form-control', 'placeholder'=>'38523123456']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('phone') !!}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('birthday', 'Datum rođenja') !!}
                            {!! Form::date('birthday',null, ['class'=>'form-control']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('birthday') !!}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('bloodtype_id', 'Krvna grupa') !!}
                            {!! Form::select('bloodtype_id', $bloodtypes, null, ['class'=>'form-control select2']) !!}
                            <span class="help-block text-red text-bold">{!! $errors->first('bloodtype_id') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right"><i
                            class="fa fa-check"></i> {!! trans('donors.add_save') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop

@section('scripts')

@stop