<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! settings('site_name') !!} - {!! trans('auth.register_title') !!}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('plugins/select2/select2.min.css') !!}
    {!! Html::style('backend/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/css/skins/_all-skins.min.css') !!}

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition register-page" style="background-color: #c50b08;">
<div class="register-box" style="width:400px;">
    <div class="register-logo">
        <a href="#" style="color: #FFFFFF;"><i class="fa fa-heart"></i> {!! settings('site_name') !!}</a>
    </div>

    <div class="register-box-body">

        <p class="login-box-msg" style="padding-bottom:0px;">{!! trans('auth.register_message') !!}</p>

        <hr>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>{!! trans('auth.register_errors') !!}</p>
            </div>
        @endif

        {!! Form::open(array(route('auth.register'))) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('firstName', trans('auth.register_name')) !!}
                    {!! Form::text('firstName', '', ['class'=>'form-control']) !!}
                    <span class="help-block text-red text-bold">{!! $errors->first('firstName') !!}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('lastName', trans('auth.register_surname')) !!}
                    {!! Form::text('lastName', '', ['class'=>'form-control']) !!}
                    <span class="help-block text-red text-bold">{!! $errors->first('lastName') !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('sex',trans('auth.register_sex')) !!}
            {!! Form::select('sex', config('global.DONOR_SEX'),null, ['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('location_id', trans('auth.register_location')) !!}
            {!! Form::select('location_id', $locations, '',['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('bloodtype_id', trans('auth.register_bloodtype')) !!}
            {!! Form::select('bloodtype_id', $bloodtypes, '', ['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('username', trans('auth.register_username')) !!}
            {!! Form::text('username', '',  ['class'=>'form-control']) !!}
            <span class="help-block text-red text-bold">{!! $errors->first('username') !!}</span>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('password', trans('auth.register_password')) !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    <span class="help-block text-red text-bold">{!! $errors->first('password') !!}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('password', trans('auth.register_password_confirm')) !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    <span class="help-block text-red text-bold">{!! $errors->first('password_confirmation') !!}</span>
                </div>
            </div>
        </div>

        @if(settings('site_recaptcha') == 1)
            <div class="form-group">
                {!! Form::captcha() !!}
            </div>
        @endif


        <div class="row">
            <div class="col-xs-8">
                <a href="{!! route('auth.login') !!}"
                   class="text-center">{!! trans('auth.register_allready_registered') !!}</a>

            </div>
            <div class="col-xs-4">
                <button type="submit"
                        class="btn btn-primary pull-right btn-flat ">{!! trans('auth.register_submit') !!}</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>

{!! Html::script('https://code.jquery.com/jquery-2.1.4.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! Html::script('plugins/select2/select2.full.min.js') !!}
{!! Captcha::script() !!}
<script>

    $(function () {
        $(".select2").select2();
    });
</script>
</body>
</html>