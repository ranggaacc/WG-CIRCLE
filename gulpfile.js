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
    mix.sass(['app.scss', 'components.scss', 'header.scss', 'footer.scss', 'main.scss'], 'public/assets/dist/css/public.css')
       .scripts(['front-controller.js'], 'public/assets/dist/js/public.js')   
       .browserSync({
           notify: true,
           proxy: 'http://localhost:3000'
       });
});
