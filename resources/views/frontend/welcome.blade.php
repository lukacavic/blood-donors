<!DOCTYPE html>
<html>
<head>
    <title>{!! settings('site_name') !!}</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {!! Html::style('backend/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/css/skins/_all-skins.min.css') !!}
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            font-weight: 100;
            font-family: 'Lato';
            background-color: #c50b08;
            color: #FFFFFF;
        }

        .container {
            padding-top: 100px;
            text-align: center;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }

        hr {
            height: 6px;
            background: url(http://ibrahimjabbari.com/english/images/hr-11.png) repeat-x 0 0;
            border: 0;
        }

        .info{
            margin-top:40px;
            font-size:13px;
            text-align: center;
        }

        .info p {
            line-height:8px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <span>
            <a href="{!! route('auth.login') !!}" style="color: #FFFFFF;"><i class="fa fa-heart"
                                                                             style="font-size: 60px;"></i></a>
                    <p><span style="font-size: 12px;font-weight: bold;">{!! trans('frontend.description') !!}</span></p>

        </span>
        <div class="title">{!! settings('community_name') !!}</div>

        <p><span style="font-size: 25px;font-style: italic;">"{!! settings('community_slogan') !!}"</span></p>
        <hr>
        <p><span style="font-size: 15px;">{!! settings('community_description') !!}</span></p>

        <div class="info">
            <p>Predsjednik: {!! settings('community_leader') !!}</p>
            <p>Ostali članovi: {!! settings('community_subleader1') !!}, {!! settings('community_subleader2') !!}, {!! settings('community_subleader3') !!}, {!! settings('community_subleader4') !!},</p>
            <p>{!! settings('community_website') !!}</p>
            <p>{!! settings('community_email')!!}</p>
        </div>
    </div>
</div>


</body>

{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js') !!}

</html>
