@extends('backend.layouts.master')

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}
@stop

@section('content')
    <section class="content-header">
        <h1>
            Arhivirani  ({!! $donors->count() !!})
            <div class="btn-group pull-right">
                @can('add-donor')
                <a href="{!! route('donor.add') !!}" class="btn btn-success"><i class="fa fa-plus"></i>
                    Dodaj </a>
                @endcan
                <a href="{!! route('donors') !!}" class="btn btn-primary"><i class="fa fa-archive"></i>
                    Aktivni</a>
            </div>
        </h1>
    </section>

    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <table id="donors" class="table table-hover table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Ime i prezime</th>
                        <th>Korisničko ime</th>
                        <th>Datum rođenja</th>
                        <th>Adresa</th>
                        <th>Mobitel</th>
                        <th>Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donors as $donor)
                        <tr>
                            <td>{!! $donor->fullNameLink !!}</td>
                            <td>{!! $donor->birthdate !!}</td>
                            <td>{!! $donor->address !!}</td>
                            <td>{!! $donor->username !!}</td>
                            <td>{!! $donor->mobile !!}</td>
                            <td>
                            </td>
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
            $('#donors').DataTable({
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