@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}
@stop

@section('content')

    <section class="content-header">
        <h1>
            {!! trans('bloodtypes.title') !!} ({!! $bloodTypes->count() !!})
            <div class="btn-group pull-right">
                @can('add-bloodtype')
                <a href="#" data-toggle="modal"
                   data-target="#addBloodTypeModal" class="btn btn-success"><i class="fa fa-plus"></i>
                    {!! trans('bloodtypes.top_add') !!}</a>
                @endcan
            </div>
        </h1>

    </section>

    @include('bloodtypes::_partials.addBloodTypeModal')

    <section class="content">

        <div class="box">

            <div class="box-body">
                <table id="users" class="table table-hover table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>{!! trans('bloodtypes.table_code') !!}</th>
                        <th>{!! trans('bloodtypes.table_name') !!}</th>
                        <th>{!! trans('bloodtypes.table_description') !!}</th>
                        <th>{!! trans('bloodtypes.table_total_donors') !!}</th>
                        <th>{!! trans('bloodtypes.table_actions') !!}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($bloodTypes as $bloodType)

                        <tr>
                            <td>{!! $bloodType->code !!}</td>
                            <td>{!! $bloodType->name !!}</td>
                            <td>{!! $bloodType->description !!}</td>
                            <td><span class="label label-success">{!! $bloodType->donor->count() !!}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" type="button"
                                       class="btn btn-default btn-flat btn-xs">{!! trans('bloodtypes.table_view') !!}</a>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle btn-xs"
                                            data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @can('edit-bloodtype')
                                        <li><a href="#" data-toggle="modal"
                                               data-target="#editBloodTypeModal{!! $bloodType->id !!}"><i
                                                        class="fa fa-edit"></i> {!! trans('bloodtypes.table_edit') !!}</a></li>
                                        @endcan
                                        @can('delete-bloodtype')
                                        <li class="divider"></li>
                                        <li><a href="#" data-toggle="modal"
                                               data-target="#deleteBloodTypeModal{!! $bloodType->id !!}"><i
                                                        class="fa fa-trash"></i> {!! trans('bloodtypes.table_delete') !!}</a></li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        @include('bloodtypes::_partials.deleteBloodTypeModal')
                        @include('bloodtypes::_partials.editBloodTypeModal')

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