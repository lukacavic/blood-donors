<!DOCTYPE html>
<html>
<head>
    <title>{!! settings('site_name') !!} - {!! trans('errors.404_title') !!}</title>

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
            margin-top: 200px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <p class="text-center"><i class="fa fa-warning" style="font-size: 100px;"></i></p>
        <div class="title">{!! trans('errors.404_message') !!}</div>
    </div>
</div>


</body>

{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js') !!}

</html>
