@extends('backend.layouts.master')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-md-9">
                <h3>
                    {!! $action->code !!} - {!! $action->name !!}
                </h3>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#maininfo" data-toggle="tab">Glavne informacije</a></li>
                        @can('manage-actions')
                            <li><a href="#manage" data-toggle="tab">Upravljanje</a></li>
                        @endcan
                    </ul>
                    @include('actions::_partials.questionCommingToAction')
                    <div class="tab-content">
                        <div class="tab-pane active" id="maininfo">
                            @include('actions::_partials.maininfo')
                        </div>
                        <div class="tab-pane" id="manage">
                            @include('actions::_partials.manage')
                        </div>
                        <div class="tab-pane" id="donorscomming">
                            @include('actions::_partials.donorscomming')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
