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

elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var jqueryPath = 'bower_components/jquery/dist';
    var jqueryUIPath = 'bower_components/jquery-ui';
    var angularPath = 'bower_components/angular';

    mix.sass('app.scss')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
        .copy(jqueryPath + '/jquery.min.js', 'public/js')
        .copy(jqueryUIPath + '/jquery-ui.min.js', 'public/js')
        .copy(jqueryUIPath + '/themes/base/jquery-ui.min.css', 'public/css')
        .copy(angularPath + '/angular.min.js', 'public/js')
        .browserify('app.js');
});
