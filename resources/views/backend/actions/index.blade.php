@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}

@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('actions.title') !!} ({!! $actions->count() !!})
            <div class="btn-group pull-right">
                @can('add-action')
                <a href="{!! route('actions.add') !!}" class="btn btn-success"><i class="fa fa-plus"></i>
                    {!! trans('actions.top_add') !!}</a>
                @endcan
            </div>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <table id="actions" class="table table-hover table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Šifra</th>
                        <th>Naziv</th>
                        <th>Status</th>
                        <th>Datum</th>
                        <th>Početak (sati)</th>
                        <th>Kraj (sati)</th>
                        <th>Lokacija</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actions as $action)
                        <tr>
                            <td>{!! $action->code !!}</td>
                            <td>{!! $action->nameLink !!}</td>
                            <td>{!! $action->getStatus() !!}</td>
                            <td>{!! $action->actionDate !!}</td>
                            <td><span class="label label-success">{!! $action->startTime !!}</span></td>
                            <td><span class="label label-danger">{!! $action->endTime !!}</span></td>
                            <td>{!! $action->place !!}</td>
                        </tr>
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
            $('#actions').DataTable({
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