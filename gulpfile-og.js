//welcome to guided gulp file.
//intended to help internal web-dev processes

var gulp = require('gulp');          // require it in this Gulpfile.js

var sass = require('gulp-sass');
var watch = require('gulp-watch');
var browserSync = require('browser-sync').create();



gulp.task('hello',function(done) {  // CALLBACK noted here - "done"
  console.log('omg its gulp yes omg')

  done(); // ! always required to callback on complete, since Gulp V4 effective.
          // Gulp automatically passes a callback function to your task as its first argument.
          // Simple way in your case would be calling the callback.
          // the task can be run in terminal also. "gulp hello" will return below
});




gulp.task('sass', function(){
  return gulp.src('app/css/**/*.scss') // glob to cover all SCSS files in the /app/scss/ dir.
    .pipe(sass())                      // convert the sass to CSS with gulp-sass
    .pipe(gulp.dest('app/css'))        // determine the Build folder
    .pipe(browserSync.stream());      // runs browserSync after the destination file fired above

    // need to COMBINE all CSS, another defaultTask (for build site)
    // need to MINIFY all CSS, another task (for build site)

});





gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888"
    });
});










function defaultTask(cb) {




  cb();
}

exports.default = defaultTask
