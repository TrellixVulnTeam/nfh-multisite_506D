'use strict';

var gulp = require('gulp');
var sass = require('gulp-dart-sass');
var gulp_concat = require('gulp-concat');
var gulp_uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');
const gulp_rename = require("gulp-rename");


gulp.task('sass', function () {
  return gulp.src('inc/assets/scss/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('build/css'));
});

var destDir = 'build/css'; //or any folder inside your public asset folder
var tempDir = 'bin/public/assets/temp/'; //any place where you want to store the concatenated, but unuglified/beautified files

gulp.task('css-uglify', function () {
  gulp.src('build/css/app.css')
  .pipe(gulp_concat('concat.css')) //this will concat all the source files into concat.css
        .pipe(gulp.dest(tempDir)) //this will save concat.css into a temp Directory
        .pipe(gulp_rename('app-min.css')) //this will rename concat.css into uglify.css, but will not replace it yet.
    .pipe(uglifycss({
      "maxLineLen": 999999999,
      "uglyComments": true
    })) //uglify uglify.css file
    .pipe(gulp.dest(destDir)); //save uglify.css
});


    // return gulp.src('inc/assets/scss/app.scss')
    // .pipe(gulp.dest('build/css'))


  gulp.watch('**/*.scss', gulp.series('sass'));

exports.default = gulp.series('sass', 'css-uglify'); // 'browserSync'
