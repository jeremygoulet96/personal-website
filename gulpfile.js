"use strict";

const { src, dest, watch, series } = require("gulp");

let gulp = require("gulp"),
    del = require("del"),
    gm = require("gulp-gm"),
    sass = require("gulp-sass")(require("sass")),
    sourcemaps = require("gulp-sourcemaps"),
    svgo = require("gulp-svgo"),
    uglify = require("gulp-uglify");

/*
  ----------------------------------
  PREPARE ASSETS
  ----------------------------------
*/
// Copy Downloads to assets
function downloads() {
  return src("src/downloads/**/*.zip")
    .pipe(dest("assets/downloads/"));
}
exports.downloads = downloads;

// Hero convert 1x
function hero1x() {
  return src("src/images/**/hero.png")
    .pipe(gm(function(gmfile){
      return gmfile.quality(95);
    },{ imageMagick: true }))
    .pipe(dest("assets/images/"));
}
exports.hero1x = hero1x;

// Hero convert 2x
function hero2x() {
  return src("src/images/**/hero@2x.png")
    .pipe(gm(function(gmfile){
      return gmfile.quality(75);
    },{ imageMagick: true }))
    .pipe(dest("assets/images/"));
}
exports.hero2x = hero2x;

// Image convert 1x
function imgArticle1x() {
  return src("src/images/work/**/article/*.{png,jpg,jpeg}")
    .pipe(gm(function(gmfile){
      return gmfile.quality(95);
    },{ imageMagick: true }))
    .pipe(dest("assets/images/work/"));
}
exports.imgArticle1x = imgArticle1x;

// Image convert 2x
function imgArticle2x() {
  return src("src/images/work/**/article/*@2x.{png,jpg,jpeg}")
    .pipe(gm(function(gmfile){
      return gmfile.quality(75);
    },{ imageMagick: true }))
    .pipe(dest("assets/images/work/"));
}
exports.imgArticle2x = imgArticle2x;

// Fullsize
function fullsize() {
  return gulp.src("src/images/work/**/fullsize.{png,jpg,jpeg,pdf}")
    .pipe(gulp.dest("assets/images/work/"));
}
exports.fullsize = fullsize;

// SVG task
function svg() {
  return src("src/images/**/*.svg")
    .pipe(svgo())
    .pipe(dest("assets/images/"))
}
exports.svg = svg;

// Fonts task
function fonts() {
  return src("src/fonts/**/*")
    .pipe(dest("assets/fonts/"))
}
exports.fonts = fonts;

// favicons task
function favicons() {
  return src("src/images/favicons/*.{webmanifest,xml,ico,png}", { "allowEmpty": true })
    .pipe(dest("assets/images/favicons/"))
}
exports.favicons = favicons;

// Node modules task
function nodeModules() {
  return src([
    "node_modules/jquery/dist/jquery.min.js"
  ])
    .pipe(dest("assets/js/"))
}
exports.nodeModules = nodeModules;

/*
  ----------------------------------
  LOCAL
  ----------------------------------
*/
// Local SASS task
function sassLocal() {
  return src("src/scss/**/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "expanded" })
    .on("error", sass.logError))
    .pipe(sourcemaps.write())
    .pipe(dest("assets/css/"));
}
exports.sassLocal = sassLocal;

// Local JS task
function jsLocal() {
  return src([
    "src/js/*.js"
  ])
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write())
    .pipe(dest("assets/js/"));
}
exports.jsLocal = jsLocal;

// Watch Task
function watchTask() {
  watch("src/**/*.scss", gulp.series(sassLocal)),
  watch("src/**/*.js", gulp.series(jsLocal)),
  watch("src/**/hero.{png,jpg,jpeg,ico,webp}", gulp.series(hero1x)),
  watch("src/**/hero@2x.{png,jpg,jpeg,ico,webp}", gulp.series(hero2x)),
  watch("src/images/work/*/article/*.{png,jpg,jpeg,ico,webp}", gulp.series(imgArticle1x)),
  watch("src/images/work/*/article/*@2x.{png,jpg,jpeg,ico,webp}", gulp.series(imgArticle2x)),
  watch("src/**/fullsize.{png,jpg,jpeg,pdf}", gulp.series(fullsize)),
  watch("src/**/*.svg", gulp.series(svg));
}
exports.watchTask = watchTask;

/*
  ----------------------------------
  PROD
  ----------------------------------
*/
// Prod SASS task
function sassProd() {
  return src("src/scss/**/*.scss", { sourcemaps: false })
    .pipe(sass({ outputStyle: "compressed" })
    .on("error", sass.logError))
    .pipe(dest("assets/css/"));
}
exports.sassProd = sassProd;

// Prod JS task
function jsProd() {
  return src([
    "src/js/*.js"
  ])
    .pipe(uglify({
      compress: { drop_console: true }
    }))
    .pipe(dest("assets/js/"));
}
exports.jsProd = jsProd;

// Clean assets folders
function cleanAssets() {
  return del("assets/*/",{ force: true });
}
exports.cleanAssets = cleanAssets;

// Default Gulp Task
exports.default = series(
  sassLocal,
  jsLocal,
  watchTask
);

// Prepare Gulp Task
exports.prepare = series(
  cleanAssets,
  sassLocal,
  jsLocal,
  nodeModules,
  fonts,
  svg,
  hero1x,
  hero2x,
  imgArticle1x,
  imgArticle2x,
  fullsize,
  favicons,
  downloads
);

// Prod Gulp Task
exports.prod = series(
  cleanAssets,
  sassProd,
  jsProd,
  nodeModules,
  fonts,
  svg,
  hero1x,
  hero2x,
  imgArticle1x,
  imgArticle2x,
  fullsize,
  favicons,
  downloads
);
