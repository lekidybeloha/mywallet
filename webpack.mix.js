const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/css/animate.css', 'public/css')
    .css('resources/css/app-style.css', 'public/css')
    .css('resources/css/icons.css', 'public/css')
    .css('resources/css/pace.min.css', 'public/css')
    .css('resources/css/sidebar-menu.css', 'public/css')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/bg-themes', 'public/bg-themes')
    .copyDirectory('resources/flags', 'public/flags')
    .js('resources/js/sidebar-menu.js', 'public/js')
    .js('resources/js/app-script.js', 'public/js')
    .js('resources/js/pace.min.js', 'public/js')
    .sourceMaps();
