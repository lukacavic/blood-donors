<div class="row" style="padding-top:10px;">
    <div class="col-md-6 ">
        @if($action->status == config('global.ACTION_INCOMING'))
            <a href="#" data-toggle="modal" data-target="#donorCommingToAction" class="btn btn-warning "><i
                        class="fa fa-question"></i> {!! trans('actions.comming_button') !!} </a>
        @endif
    </div>
    <div class="col-md-6 ">
            <span class="pull-right" style="padding-top:5px;">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-gears"></i> Upravljanje <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" style="right:2px;left:auto;">
                        @can('action-edit')
                            <li><a href="{!! route('action.edit',$action->id) !!}"><i class="fa fa-edit"></i> Uredi</a></li>
                        @endcan

                        @can('action-modify-status')
                            <li><a href="#" data-toggle="modal" data-target="#changeActionStatus"><i
                                        class="fa fa-exchange"></i> Izmjena statusa</a></li>
                        @endcan

                        @if($action->status == config('global.ACTION_INCOMING'))
                            @can('action-send-sms')
                            <li><a href="#" data-toggle="modal" data-target="#questionCommingToAction"><i
                                            class="fa fa-bell"></i> Obavijesti darivatelje</a></li>
                            @endcan
                        @endif

                        @can('action-delete')
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#deleteActionModal"><i class="fa fa-trash"></i>
                                    Izbriši</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </span>
    </div>
</div>
<hr>

@include('actions::_partials.questionCommingToAction')
@include('actions::_partials._modals.changeActionStatusModal')
@include('actions::_partials.donorCommingToAction')
@include('actions::_partials._modals.deleteActionModal')

<p><strong>Postotak uspješnosti ( {!! $action->successProgress() !!}% )</strong></p>
<div class="progress">
    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
         aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
         style="{!! $action->successProgress() !!}">
    </div>
</div>
<p>
    <strong>Informacije</strong>
</p>
<div class="row">
    <div class="col-md-6">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li>
                        <a href="#">Naziv <span class="pull-right x"><b>{!! $action->nameWithCode !!}</b></span></a>
                    </li>
                    <li>
                        <a href="#">Datum <span class="pull-right">{!! $action->actionDate !!}</span></a>
                    </li>
                    <li>
                        <a href="#">Početak (sati) <span class="pull-right ">{!! $action->startTime !!}</span></a>
                    </li>
                    <li>
                        <a href="#">Kraj (sati) <span class="pull-right ">{!! $action->endTime !!}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li>
                        <a href="#">Lokacija <span class="pull-right ">{!! $action->place !!} </span> </a>
                    </li>
                    <li>
                        <a href="#">Status <span class="pull-right ">{!! $action->getStatus() !!}</span></a>
                    </li>
                    <li>
                        <a href="#">Uspješnih darivanja <span
                                    class="pull-right badge bg-green">{!! count($action->success()) !!}</span></a>
                    </li>
                    <li>
                        <a href="#">Neuspješnih darivanja <span
                                    class="pull-right badge bg-red">{!! count($action->failed()) !!}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <strong>Napomena:</strong>
        <p></p>
        <p>{!! $action->description !!}</p>
    </div>
</div>
