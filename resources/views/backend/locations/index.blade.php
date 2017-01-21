@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}
@stop

@section('content')

    <section class="content-header">
        <h1>
            {!! trans('locations.title') !!} ({!! $locations->count() !!})
            <div class="btn-group pull-right">
                @can('add-location')
                <a href="#" data-toggle="modal"
                   data-target="#addLocationModal" class="btn btn-success"><i class="fa fa-plus"></i>
                    {!! trans('locations.top_add') !!}</a>
                @endcan
            </div>
        </h1>

    </section>

    @include('locations::_partials.addLocationModal')

    <section class="content">

        <div class="box">

            <div class="box-body">
                <table id="users" class="table table-hover table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>{!! trans('locations.table_code') !!}</th>
                        <th>{!! trans('locations.table_name') !!}</th>
                        <th>{!! trans('locations.table_description') !!}</th>
                        <th>{!! trans('locations.table_total_donors') !!}</th>
                        <th>{!! trans('locations.table_actions') !!}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($locations as $location)

                        <tr>
                            <td>{!! $location->code !!}</td>
                            <td>{!! $location->name !!}</td>
                            <td>{!! $location->description !!}</td>
                            <td><span class="label label-success">{!! $location->donors->count() !!}</span></td>

                            <td>
                                <div class="btn-group">
                                    <a href="#" type="button"
                                       class="btn btn-default btn-flat btn-xs">{!! trans('locations.table_view') !!}</a>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle btn-xs"
                                            data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @can('edit-location')
                                        <li><a href="#" data-toggle="modal"
                                               data-target="#editLocationModal{!! $location->id !!}"><i
                                                        class="fa fa-edit"></i> {!! trans('locations.table_edit') !!}</a></li>
                                        @endcan
                                        @can('delete-location')
                                        <li class="divider"></li>
                                        <li><a href="#" data-toggle="modal"
                                               data-target="#deleteLocationModal{!! $location->id !!}"><i
                                                        class="fa fa-trash"></i> {!! trans('locations.table_delete') !!}</a></li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        @include('locations::_partials.deleteLocationModal')
                        @include('locations::_partials.editLocationModal')

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>

@stop

@section('scripts')
    {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
    <script>
        $(function () {
            $('#users').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
@stop