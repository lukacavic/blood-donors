var elixir = require('laravel-elixir');

elixir(function (mix) {

    //jQuery
    mix.copy('bower_components/jquery/dist/jquery.min.js', 'resources/assets/js/vendor/jquery.js');

    //Bootstrap
    mix.copy('bower_components/AdminLTE/bootstrap/css/bootstrap.css', 'resources/assets/css/vendor/bootstrap.css');
    mix.copy('bower_components/AdminLTE/bootstrap/js/bootstrap.js', 'resources/assets/js/vendor/bootstrap.js');

    //Datatables
    mix.copy('bower_components/datatables.net/js/jquery.dataTables.min.js', 'resources/assets/js/vendor/datatables.js');
    mix.copy('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js', 'resources/assets/js/vendor/dataTables.bootstrap.min.js');
    mix.copy('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css', 'resources/assets/css/vendor/dataTables.bootstrap.min.css');
    mix.copy('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css', 'resources/assets/css/vendor/responsive.bootstrap.min.css');
    mix.copy('bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js', 'resources/assets/js/vendor/datatables-responsive.bootstrap.js');

    //Vue.js
    mix.copy('bower_components/vue/dist/vue.min.js', 'resources/assets/js/vendor/vue.min.js');

    //Select2
    mix.copy('bower_components/select2/dist/js/select2.min.js', 'resources/assets/js/vendor/select2.min.js');
    mix.copy('bower_components/select2/dist/css/select2.min.css', 'resources/assets/css/vendor/select2.min.css');

    //Admin LTE
    mix.copy('bower_components/AdminLTE/dist/css/AdminLTE.css', 'resources/assets/css/vendor/admin-lte.css');
    mix.copy('bower_components/AdminLTE/dist/css/skins/skin-red.css', 'resources/assets/css/vendor/skin-red.css');
    mix.copy('bower_components/AdminLTE/dist/js/app.js', 'resources/assets/js/vendor/adminLTE.js');

    //Fonts
    mix.copy('bower_components/AdminLTE/bootstrap/fonts', 'public/fonts');
    mix.copy('bower_components/font-awesome/css/font-awesome.css', 'resources/assets/css/vendor/font-awesome.css');
    mix.copy('bower_components/font-awesome/fonts', 'public/fonts');


    // Merge all CSS files in one file.
    mix.styles([
        'vendor/bootstrap.css',
        'vendor/font-awesome.css',
        'vendor/admin-lte.css',
        'vendor/skin-red.css',
        'vendor/select2.min.css',
        'vendor/dataTables.bootstrap.min.css',
        'main.css'
    ]);

    mix.scripts([
        'vendor/jquery.js',
        'vendor/bootstrap.js',
        'vendor/select2.min.js',
        'vendor/adminLTE.js',
        'vendor/datatables.js',
        'vendor/dataTables.bootstrap.min.js',
        'vendor/vue.min.js',
        'main.js'
    ]);
});