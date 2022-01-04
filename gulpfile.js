'use strict';

const { src, dest, watch, series } = require('gulp');

var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    merge = require('merge-stream'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    svgo = require('gulp-svgo'),
    gm = require('gulp-gm');

// Compile SASS task
function compileSass() {
  return src('src/scss/**/*.scss', { sourcemaps: true })
    .pipe(sass({outputStyle: 'expanded'})
    .on('error', sass.logError))
    .pipe(dest('assets/css/'));
}
exports.compileSass = compileSass

// Compile JS task
function compileJS() {
  return src('src/js/*.js')
    .pipe(dest('assets/js/'));
}
exports.compileJS = compileJS;

// Uglify SASS task
function uglifySass() {
  return src('src/scss/**/*.scss', { sourcemaps: true })
    .pipe(sass({outputStyle: 'compressed'})
    .on('error', sass.logError))
    .pipe(dest('assets/css/'));
}
exports.uglifySass = uglifySass;

// Uglify JS task
function uglifyJS() {
  return src('src/js/*.js')
    .pipe(uglify({
      compress: { drop_console: true }
    }))
    .pipe(dest('assets/js/'));
}
exports.uglifyJS = uglifyJS;

// Browser-Sync Serve
function browserSyncServe(cb) {
  browserSync.init({
    server: {
      baseDir: 'app/'
    }
  });
  cb();
}

// Reload page
function browserSyncReload(cb) {
  browserSync.reload();
  cb();
}

// Watch Task
function watchTask() {
  watch(['src/**/*.php', 'src/**/*.html', 'src/**/*.xml'], browserSyncReload);
  watch(['src/**/*.scss', 'src/**/*.js'], gulp.series(compileSass, compileJS, browserSyncReload));
}
exports.watchTask = watchTask;

// Watch SASS + JS Task (when using Jekyll's livereload)
function watchSassJS() {
  watch(['src/**/*.scss', 'src/**/*.js'], gulp.series(compileSass, compileJS));
}
exports.watchSassJS = watchSassJS;

// SVG task
function svg() {
  return src('src/images/**/*.svg')
    .pipe(svgo())
    .pipe(dest('assets/images/'));
}
exports.svg = svg;

// Fonts task
function fonts() {
  return src('src/fonts/**/*')
    .pipe(dest('app/fonts/'));
}
exports.fonts = fonts;

// Image convert 1x
function img1x() {
  return src('src/images/**/hero.png')
    .pipe(gm(function(gmfile){
      return gmfile.setFormat('png').quality(95);
    },{ imageMagick: true }))
    .pipe(dest('assets/images'));
}
exports.img1x = img1x;

// Image convert 2x-3x
function img2x() {
  return src('src/images/**/hero{@2x,@3x}.png')
    .pipe(gm(function(gmfile){
      return gmfile.setFormat('png').quality(75);
    },{ imageMagick: true }))
    .pipe(dest('assets/images'));
}
exports.img2x = img2x;

// Fullsize
function fullsize() {
  return gulp.src('src/images/**/fullsize.png')
    .pipe(gulp.dest('assets/images'));
}
exports.fullsize = fullsize;

// Optimize images Gulp Task
exports.optimizeImages = series(
  img1x,
  img2x,
  fullsize
);

// Default Gulp Task
exports.default = series(
  compileSass,
  compileJS,
  browserSyncServe,
  watchTask
);

// Prepare Gulp Task
exports.prepare = series(
  compileSass,
  compileJS,
  fonts,
  svg,
  img1x,
  img2x,
  fullsize
);

// Prod Gulp Task
exports.prod = series(
  svg,
  uglifySass,
  uglifyJS
);
