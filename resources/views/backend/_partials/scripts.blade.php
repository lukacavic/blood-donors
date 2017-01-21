{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! Html::script('plugins/select2/select2.min.js') !!}
{!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('backend/js/app.min.js') !!}
{!! Html::script('plugins/datatables/jquery.dataTables.js') !!}
{!! Html::script('plugins/datatables/dataTables.bootstrap.js') !!}

<script>
    $(function () {
        $(".select2").select2();
    });
</script>

@yield('scripts')