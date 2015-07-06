var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        'main.scss',
        '../../../vendor/materialize/sass/materialize.scss',
        '../../../vendor/angular-chart/dist/angular-chart.css'
    ]);
    mix.scripts([
        '../../../vendor/jquery/dist/jquery.js',
        '../../../vendor/bootstrap/dist/js/bootstrap.js',
        '../../../vendor/angular/angular.js',
        '../../../resources/assets/scripts/app.js',
        '../../../vendor/materialize/js/bin/materialize.min.js',
        '../../../vendor/angular-chart/dist/angular-chart.js'
    ]);

});