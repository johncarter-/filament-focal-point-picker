const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss');

mix
    .postCss('resources/css/filament-focal-point-picker.css', 'css/filament-focal-point-picker.css', {}, [
        tailwindcss('./tailwind.config.js')
    ])
    .setPublicPath('resources/dist')

