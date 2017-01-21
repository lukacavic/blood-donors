<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! settings('site_name') !!}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @include('backend._partials.styles')

</head>

<body class="hold-transition skin-red sidebar-mini fixed">

<div class="wrapper">

    @include('backend._partials.header')

    @include('backend._partials.sidebar')

    <div class="content-wrapper">

        <section class="content-header">

            @include('backend._partials.notifications')

        </section>

        @yield('content')

    </div>

    @include('backend._partials.footer')

    @yield('control-sidebar')

</div>

@include('backend._partials.scripts')

</body>
</html>
