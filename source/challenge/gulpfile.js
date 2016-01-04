var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bower_base_path': './vendor/bower_components/',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
};

elixir(function (mix) {
    mix.sass('app.scss', 'public/css/app.css')
        .copy(paths.bootstrap + 'stylesheets/', 'resources/assets/sass')
        .copy(paths.bootstrap + 'fonts/bootstrap', 'public/fonts')
        .copy(paths.bootstrap + 'javascripts/bootstrap.js', 'public/js/vendor/bootstrap.js')
        .copy(paths.bower_base_path + 'jquery/dist/jquery.min.js', 'public/js/vendor/jquery.js')
        .copy(paths.bower_base_path + 'font-awesome/css/font-awesome.min.css', 'public/css/vendor/font-awesome.css');

    mix.scripts([
        'app.js'
    ], 'public/js/app.js');

    mix.version('public/css/app.css');
});