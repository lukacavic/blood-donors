@extends('backend.layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            Darivatelji ({!! count($donors) !!})
            <div class="btn-group pull-right">
                <a href="{!! route('donor.add') !!}" class="btn btn-success"><i class="fa fa-plus"></i>
                    Dodaj</a>
                <a href="{!! route('donors.archived') !!}" class="btn btn-primary"><i class="fa fa-archive"></i>
                    Arhivirani </a>
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
                            <td>{!! $donor->username !!}</td>
                            <td>{!! $donor->birthday !!}</td>
                            <td>{!! $donor->address !!}</td>
                            <td>{!! $donor->mobile !!}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
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