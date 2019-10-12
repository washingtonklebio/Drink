const mix = require('laravel-mix');
const webpack = require('./webpack.config');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig(Object.assign(webpack));