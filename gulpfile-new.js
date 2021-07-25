var gulp = require('gulp');          // require it in this Gulpfile.js
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

var gulp = require('gulp');          // require it in this Gulpfile.js

var sass = require('gulp-sass');
var watch = require('gulp-watch');
var browserSync = require('browser-sync').create();




var paths = {
    styles: {
        src: "./src/styles/scss/**/*.scss",
        dest: "./view/styles"
    },
    htmls: {
        src: "./src/**/*.html",
        dest: "./view"
    }
};

const styles= () => {
        return...
    }

const html= () => {
            return...
        }

const watch = () => {
        browserSync.init({
            server: {
                baseDir: "./view"
            }
        });
        gulp.watch(paths.styles.src, style);
        gulp.watch(paths.htmls.src, html);
        gulp.watch("src/**/*.html").on('change', browserSync.reload);
    };

exports.style = style;
exports.html = html;
exports.watch = watch;

var build = gulp.parallel(style, html, watch);

gulp.task('default', working);
