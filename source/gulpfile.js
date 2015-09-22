var gulp = require("gulp");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var less = require("gulp-less");
var minifyCss = require('gulp-minify-css');

gulp.task("js", function() {
  gulp.src(["bower_components/jquery/dist/jquery.js", "bower_components/bootstrap/dist/js/bootstrap.js", "bower_components/angular/angular.js", "bower_components/angular-route/angular-route.js","resources/assets/js/**/*.js"])            // Read the files
    .pipe(concat("app.js"))   // Combine into 1 file
    .pipe(uglify())                     // Minify
    .pipe(rename({extname: ".min.js"})) // Rename to ng-quick-date.min.js
    .pipe(gulp.dest("public/js"))            // Write minified to disk
});
gulp.task("css", function(){
  gulp.src(["bower_components/bootstrap/dist/css/bootstrap.css", "resources/assets/less/**/*.less"])
    .pipe(less())
    .pipe(concat("app.css"))
    .pipe(minifyCss())
    .pipe(rename({extname: ".min.css"})) // Rename to ng-quick-date.min.js
    .pipe(gulp.dest("public/css"))            // Write minified to disk
});

gulp.task("default", function() {
  gulp.start("js");
  gulp.start("css");
});