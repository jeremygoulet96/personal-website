'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    svgo = require('gulp-svgo'),
    imagemin = require('gulp-imagemin'),
    imageminMozjpeg = require('imagemin-mozjpeg');

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

// Sass-Watch task
gulp.task('watch', ['sass'], function() {
    gulp.watch("src/scss/**/*.scss", ['sass']);
    gulp.watch("assets/xml/**/*.xml").on('change', browserSync.reload);
    gulp.watch("**/*.php").on('change', browserSync.reload);
});

// Img Task
gulp.task('img', ['img1x', 'img2x3x'], function () {
    return gulp.src('src/images/**/fullsize.jpg')
        .pipe(gulp.dest('assets/images'));
});

// Img 1x
gulp.task('img1x', function () {
    return gulp.src('src/images/**/hero.jpg')
        .pipe(imagemin([
            imagemin.jpegtran({progressive: true}),
            imageminMozjpeg({
                quality: 95
            })
        ]))
        .pipe(gulp.dest('assets/images'));
});

// Img 2x & 3x
gulp.task('img2x3x', function () {
    return gulp.src('src/images/**/hero{@2x,@3x}.jpg')
        .pipe(imagemin([
            imagemin.jpegtran({progressive: true}),
            imageminMozjpeg({
                quality: 75
            })
        ]))
        .pipe(gulp.dest('assets/images'));
});

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

// Default task
gulp.task('default', ['watch']);
