const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

// Enable versioning in production
if (mix.inProduction()) {
    mix.version();
}
