'use strict';

var gulp = require('gulp'),
    merge = require('merge-stream'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    svgo = require('gulp-svgo'),
    gm = require('gulp-gm');

// SASS task
gulp.task('sass', function () {
    return gulp.src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
});

// SASS task
gulp.task('prod', function () {
    return gulp.src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('assets/css'));
});

// Sass-Watch task
gulp.task('watch', ['sass'], function() {
    gulp.watch("src/scss/**/*.scss", ['sass']);
    gulp.watch("assets/xml/**/*.xml").on('change', browserSync.reload);
    gulp.watch("**/*.php").on('change', browserSync.reload);
});

// Img Task
gulp.task('img', ['imgConvert', 'fullsize']);

// Image convert
gulp.task('imgConvert', function () {
    // 1x
    gulp.src('src/images/**/hero.png')
        .pipe(gm(function (gmfile) {
            return gmfile.setFormat('jpg').quality(95);
        }, {
            imageMagick: true
        }))
        .pipe(gulp.dest('assets/images'));
    // 2x, 3x
    gulp.src('src/images/**/hero{@2x,@3x}.png')
        .pipe(gm(function (gmfile) {
            return gmfile.setFormat('jpg').quality(75);
        }, {
            imageMagick: true
        }))
        .pipe(gulp.dest('assets/images'));
})

// Fullsize
gulp.task('fullsize', ['imgConvert'], function () {
    return gulp.src('src/images/**/fullsize.png')
        .pipe(gulp.dest('assets/images'));
})

// UglifyJS task
gulp.task('uglify', function () {
    return gulp.src('assets/js/*.js')
        .pipe(uglify({
            compress: {
                drop_console: true
            }
        }))
        .pipe(gulp.dest('assets/js/'));
});

// SVG task
gulp.task('svg', function () {
    return gulp.src('src/images/icons/**/*.svg')
        .pipe(svgo())
        .pipe(gulp.dest('assets/images/icons/'));
});

// Node Task
gulp.task('npm', function () {
    var jquery = gulp.src('node_modules/jquery/dist/jquery.min.js')
        .pipe(gulp.dest('assets/js/jquery/'));

    var requirejs = gulp.src('node_modules/requirejs/require.js')
        .pipe(gulp.dest('assets/js/requirejs/'));

    return merge(jquery, requirejs);
});

// Default task
gulp.task('default', ['watch', 'npm']);
