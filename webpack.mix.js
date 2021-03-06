let mix = require('laravel-mix');

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

mix.browserSync({
    host: 'dev.chat.com',
    proxy: {
        target: "http://dev.chat.app",
        ws: true
    },
    browser: "google chrome",
    files: [
       './**/*.css',
       './**/*.js',
       './app/*.php',
       './app/**/**/*.php',
       './app/**/**/**/*.php',
       './config/**/*',
       './resources/views/**/*.blade.php',
       './resources/views/*.blade.php',
       // './resources/assets/sass/*.scss',
       './resources/assets/js/components/*.vue',
       './routes/**/*'
    ],
    watchOptions: {
      usePolling: true,
      interval: 100
    },
    open: "external",
    reloadOnRestart: true
});



mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
