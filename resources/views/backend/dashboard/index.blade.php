@extends('backend.layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            {!! trans('dashboard.title') !!}
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! trans('dashboard.topdonors_title') !!}</h3>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($topDonors as $donor)
                                <li>
                                    Avatr Ovdje
                                    <a class="users-list-name" href="#">{!! $donor->fullname !!}</a>
                                    <span class="users-list-date">{!! trans('dashboard.topdonors_actions') !!} {!! $donor->actions->count() !!}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! trans('dashboard.chart_title') !!}</h3>
                    </div>
                    <div class="box-body no-padding">
                        <canvas id="actions" width="809" height="240"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-green-active">
                        <h3 class="widget-user-username text-center">{!! trans('dashboard.topdonor_title') !!}</h3>
                        <h5 class="widget-user-desc text-center">{!! $topDonors->first()->fullName !!}</h5>
                    </div>
                    <div class="widget-user-image" style="top:75px;">

                    </div>
                    <div class="box-footer" style="padding-top: 50px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="description-block">
                                    <h5 class="description-header" style="font-size: 25px;">{!! count($topDonors->first()->successDonations()) !!}</h5>
                                    <span class="description-text">{!! trans('dashboard.topdonor_actions') !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-red-active">
                        <h3 class="widget-user-username text-center">{!! trans('dashboard.mystats_title') !!}</h3>
                    </div>
                    <div class="widget-user-image">

                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{!! auth()->user()->actions()->count() !!}</h5>
                                    <span class="description-text">{!! trans('dashboard.mystats_actions') !!}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{!! count(auth()->user()->successDonations()) !!}</h5>
                                    <span class="description-text">{!! trans('dashboard.mystats_success') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{!! count(auth()->user()->failedDonations()) !!}</h5>
                                    <span class="description-text">{!! trans('dashboard.mystats_failed') !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
    {!! Html::script('plugins/chartjs/Chart.min.js') !!}
    <script>
        (function() {
            var ctx = document.getElementById('actions').getContext('2d');
            var chart = {
                labels: actionsLabels,
                responsive: true,
                fullWidth:true,
                display:false,
                datasets: [{
                    data: actionsTotal,
                    fillColor : "#f39c12",
                    strokeColor : "#f39c12",
                    pointColor : "#f39c12"
                }]
            };
            new Chart(ctx).Bar(chart, { bezierCurve: false });
        })();
    </script>

@stop