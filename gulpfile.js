const elixir = require('laravel-elixir');

var gulp = require('gulp');
var concat = require('gulp-concat');
var header = require('gulp-header');
var connect = require("gulp-connect");
var less = require("gulp-less");
var autoprefixer = require('gulp-autoprefixer');
var ejs = require("gulp-ejs");
var uglify = require('gulp-uglify');
var ext_replace = require('gulp-ext-replace');
var cssmin = require('gulp-cssmin');

require('laravel-elixir-vue');

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

elixir(mix => {
    // mix.sass('app.scss')
    //    .webpack('app.js');
    mix.less('app.less');
});


gulp.task('app_less', function() {
    return gulp.src(['./resources/assets/less/app.less'])
        .pipe(less())
        .pipe(autoprefixer())
        // .pipe(header("app"))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('watch_app_less', function() {
    gulp.watch('./resources/assets/less/app.less', ['app_less']);
});
gulp.task('app_server', function() {
    connect.server();
});
gulp.task("app", ['app_less', 'watch_app_less']);
