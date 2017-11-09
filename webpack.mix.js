const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.browserSync('bri-int.dev');
mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/admin/schedule/index.js', 'public/js/dist/schedule.js')
    .styles('resources/assets/css/toastr.min.css', 'public/css/dist/toastr.min.css');
