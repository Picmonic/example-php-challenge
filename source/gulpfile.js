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

 var sass_paths = [
 	'./resources/assets/sass/*.scss',
 	'./resources/assets/components/**/*.scss'
 ];

elixir(function(mix) {
    mix.sass(sass_paths, 'public/css/app.css');
    mix.browserify(['main.jsx'], 'public/js/app.js');
    elixir.Task.find('sass').watch(sass_paths);
});
