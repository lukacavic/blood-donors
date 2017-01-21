<div class="row">
    <div class="col-md-6">
        <h5><strong>{!! trans('actions.single_comming') !!} ( 0 )</strong></h5>
        <table id="successDonors" class="table table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th></th>
                <th>{!! trans('actions.single_table_name') !!}</th>
                <th>{!! trans('actions.single_table_address') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comming as $donor)
                <tr>
                    <td></td>
                    <td>{!! $donor->firstName . ' ' . $donor->lastName !!}</td>
                    <td>{!! $donor->address!!}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h5><strong>{!! trans('actions.single_not_comming') !!} ( 0 )</strong></h5>
        <table id="failedDonors" class="table table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th></th>
                <th>{!! trans('actions.single_table_name') !!}</th>
                <th>{!! trans('actions.single_table_address') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notComming as $donor)
                <tr>
                    <td>{!! $donor->present()->getDonorAvatar(['class'=>'img-circle','width'=>20]) !!}</td>
                    <td>{!! $donor->firstName . ' ' . $donor->lastName !!}</td>
                    <td>{!! $donor->present()->getFullAddress() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>