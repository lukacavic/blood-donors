<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('auth.login_title') !!} - {!! settings('site_name') !!} </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}

    {!! Html::style('backend/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/css/skins/_all-skins.min.css') !!}
    {!! Html::style('plugins/iCheck/square/blue.css') !!}

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" style="background-color: #c50b08;">
<div class="login-box">

    <div class="login-logo">
        <a href="#" style="color: #FFFFFF;"><i class="fa fa-heart"></i> {!! settings('site_name') !!}</a>
    </div>

    <div class="login-box-body">

        <p class="login-box-msg">{!! trans('auth.login_message') !!}</p>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {!! Form::open(array(route('auth.login'))) !!}

        <div class="form-group has-feedback">
            {!! Form::text('username', null, ['class'=>'form-control', 'placeholder'=>trans('auth.login_username')]) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>trans('auth.login_password')]) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        @if(settings('site_recaptcha') == 1)
            <div class="form-group">
                {!! Form::captcha() !!}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {!! Form::checkbox('remember') !!} {!! trans('auth.login_remember') !!}
                    </label>
                </div>
            </div>

            <div class="col-xs-4">
                {!! Form::submit(trans('auth.login_submit'), ['class'=>'btn btn-primary btn-block btn-flat']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        @if(settings('site_registrations') == 1)
            <a href="{!! route('auth.register') !!}">{!! trans('auth.login_create_account') !!}</a><br>
        @endif
    </div>
</div>

{!! Html::script('https://code.jquery.com/jquery-2.1.4.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
{!! Captcha::script() !!}

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
