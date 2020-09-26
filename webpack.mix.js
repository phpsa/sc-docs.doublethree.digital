const mix = require('laravel-mix')

mix.postCss('resources/css/site.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
])

mix.js('resources/js/site.js', 'public/js')

if (mix.inProduction()) {
   mix.version()
}
