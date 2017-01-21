{!! Form::open(['route' => ['action.success',$action->id]]) !!}
<div class="row" style="padding-top:20px;">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('donors', trans('actions.single_donors_select')) !!}
            {!! Form::select('donors[]', $donors, null, ['class'=>'form-control select2','multiple'=>true,'style'=>'width:100%;']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <button type="submit" name="success" value="success" class="btn btn-success btn-flat"><i class="fa fa-check"></i> {!! trans('actions.single_managedbutton') !!}</button>
    </div>
    <div class="col-md-6">
        <button type="submit" name="fail" value="fail" class="btn btn-danger pull-right btn-flat"><i class="fa fa-minus"></i> {!! trans('actions.single_failedbutton') !!}</button>
    </div>
</div>
{!! Form::close() !!}

<hr>
<div class="row">
    <div class="col-md-6">
        <h5><strong>{!! trans('actions.single_managedtitle') !!} ({!! count($action->success()) !!})</strong></h5>
        <table id="successDonors" class="table table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th></th>
                <th>{!! trans('actions.single_table_name') !!}</th>
                <th>{!! trans('actions.single_table_address') !!}</th>
                <th>{!! trans('actions.single_table_actions') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($action->success() as $donor)
                <tr>
                    <td></td>
                    <td>{!! $donor->firstName . ' ' . $donor->lastName !!}</td>
                    <td>{!! $donor->address !!}</td>
                    <td>
                        <a href="#" class="badge bg-red" data-toggle="modal" data-target="#removeDonorFromList{!! $donor->id !!}"> <i class="fa fa-minus"></i></a>
                    </td>
                </tr>
                @include('backend.actions._partials.removeDonorFromList')
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h5><strong>{!! trans('actions.single_failedtitle') !!} ({!! count($action->failed()) !!})</strong></h5>
        <table id="failedDonors" class="table table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th></th>
                <th>{!! trans('actions.single_table_name') !!}</th>
                <th>{!! trans('actions.single_table_address') !!}</th>
                <th>{!! trans('actions.single_table_actions') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($action->failed() as $donor)
                <tr>
                    <td></td>
                    <td>{!! $donor->firstName . ' ' . $donor->lastName !!}</td>
                    <td>{!! $donor->address !!}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#removeDonorFromList{!! $donor->id !!}" class="badge bg-red"> <i class="fa fa-minus"></i></a>
                    </td>
                </tr>
                @include('backend.actions._partials.removeDonorFromList')
            @endforeach
            </tbody>
        </table>
    </div>
</div>

