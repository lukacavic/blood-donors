@extends('backend.layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            {!! $donor->fullName !!}
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{!! $donor->fullName !!}</h3>
                        <p class="text-muted text-center">Krvna grupa: {!! $donor->bloodtype->name !!}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Broj akcija</b> <a class="pull-right">{!! $donor->actions->count() !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Uspješnih</b> <a class="pull-right">{!! count($donor->successDonations()) !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Neuspješnih</b> <a class="pull-right">{!! count($donor->failedDonations()) !!}</a>
                            </li>
                        </ul>
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-block btn-success" href="{!! route('donor.edit', $donor->id) !!}"><i class="fa fa-edit"></i> Uredi</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">Action
                                        <span class="fa fa-caret-down"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-key"></i>Promjena lozinke</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="fa fa-trash"></i> Izbriši</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#history" data-toggle="tab">Povijest darivanja</a></li>
                        <li><a href="#contacts" data-toggle="tab">Kontakti</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="history">
                            <ul class="timeline timeline-inverse">
                                @foreach($donor->actions as $action)
                                    <li class="time-label">
                                    <span class="bg-red">
                                     {!! $action->actionDate !!}
                                    </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-plus bg-green"></i>
                                        @if($action->pivot->status == 1)
                                            <i class="fa fa-plus bg-green"></i>
                                        @else
                                            <i class="fa fa-minus bg-red"></i>
                                        @endif
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><strong><a
                                                            href="{!! route('action',$action->id) !!}">{!! $action->name !!}</a></strong>
                                            </h3>
                                            @if($action->pivot->status == 1)
                                                <h3 class="timeline-header no-border">{!! trans('donors.history_action_success') !!}</h3>
                                            @else
                                                <h3 class="timeline-header no-border">{!! trans('donors.history_action_failed') !!}</h3>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="active tab-pane" id="contacts">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop