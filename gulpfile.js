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

// Img
gulp.task('img', function () {
    return gulp.src('src/images/**/*.jpg')
        .pipe(imagemin([
            imagemin.jpegtran({progressive: true}),
            imageminMozjpeg({
                quality: 85
            })
        ]))
        .pipe(gulp.dest('assets/images'));
});

// JS task
gulp.task('js', function () {
    return gulp.src('assets/js/*.js')
        .pipe(uglify({
            compress: {
                drop_console: true
            }
        }))
        .pipe(gulp.dest('assets/js/'));
});

// SVG
gulp.task('svg', function () {
    return gulp.src('src/images/icons/**/*.svg')
        .pipe(svgo())
        .pipe(gulp.dest('assets/images/icons/'));
});

// Sass-Watch task
gulp.task('watch', ['sass'], function() {
    gulp.watch("src/scss/**/*.scss", ['sass']);
    gulp.watch("assets/xml/**/*.xml").on('change', browserSync.reload);
    gulp.watch("**/*.php").on('change', browserSync.reload);
});

// JS-Watch task
gulp.task('js-watch', ['js'], function(done) {
    browserSync.reload();
    done();
});

// Default task
gulp.task('default', ['watch', 'js-watch'], function () {
    // Browser-Sync
    browserSync.init({
        proxy: "localhost/~jeremygoulet/personal-website/",
        browser: "google chrome"
    });
});
