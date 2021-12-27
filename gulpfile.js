'use strict';

const { src, dest, watch } = require('gulp');

var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    merge = require('merge-stream'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    svgo = require('gulp-svgo'),
    gm = require('gulp-gm');

// Compile SASS task
function compileSass(done) {
  src('src/scss/**/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sass({
      outputStyle: 'expanded'
  }).on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(dest('assets/css'))
  .pipe(browserSync.stream());
  done();
}
exports.compileSass = compileSass

// Compile SASS task for Prod
function prod(done) {
  src('src/scss/**/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sass({
      outputStyle: 'compressed'
  }).on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(dest('assets/css'));
  done();
}
exports.prod = prod

// Sass-Watch task
gulp.task('watch', function() {
  watch('src/scss/**/*.scss', compileSass);
  watch('assets/xml/**/*.xml').on('change', browserSync.reload);
  watch('**/*.php').on('change', browserSync.reload);
});

// Image convert 1x
gulp.task('img1x', function () {
    // 1x
    return src('src/images/**/hero.png')
        .pipe(gm(function (gmfile) {
            return gmfile.setFormat('png').quality(95);
        }, {
            imageMagick: true
        }))
        .pipe(dest('assets/images'));
})

// Image convert 2-3x
gulp.task('img2x', function () {
    // 2x, 3x
    return src('src/images/**/hero{@2x,@3x}.png')
        .pipe(gm(function (gmfile) {
            return gmfile.setFormat('png').quality(75);
        }, {
            imageMagick: true
        }))
        .pipe(dest('assets/images'));
})

// Fullsize
gulp.task('fullsize', function() {
    return gulp.src('src/images/**/fullsize.png')
      .pipe(gulp.dest('assets/images'));
});

gulp.task('imgConvert', gulp.series('img1x', 'img2x', async function() {
    console.log('Images converted successfully. IMG CONVERT');
}));

gulp.task('img', gulp.series('fullsize', 'imgConvert', async function() {
    console.log('Images converted successfully. IMG');
}));

// UglifyJS task
gulp.task('uglify', function () {
    return src('assets/js/*.js')
        .pipe(uglify({
            compress: {
                drop_console: true
            }
        }))
        .pipe(dest('assets/js/'));
});

// jQuery task
gulp.task('copy-jquery', function() {
   return src('node_modules/jquery/dist/jquery.min.js')
      .pipe(dest('assets/js/jquery/'));
});

// SVG task
gulp.task('svg', function () {
    return src('src/images/icons/**/*.svg')
        .pipe(svgo())
        .pipe(dest('assets/images/icons/'));
});

// RequireJS task
gulp.task('copy-requirejs', function() {
   return src('node_modules/requirejs/require.js')
      .pipe(dest('assets/js/requirejs/'));
});

// Default task
gulp.task('default', gulp.series('copy-requirejs', 'copy-jquery', async function() {
    console.log('Build completed.');
}));
