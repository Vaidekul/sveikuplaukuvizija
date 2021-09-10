/*global 
    require:true
*/
console.log("Gulp Start");
require("es6-promise").polyfill();
var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var minifycss = require("gulp-minify-css");
var rtlcss = require("gulp-rtlcss");
var rename = require("gulp-rename");
var plumber = require("gulp-plumber");
var gutil = require("gulp-util");
var imagemin = require("gulp-imagemin");
var browserSync = require("browser-sync").create();
var reload = browserSync.reload;
var maps = require("gulp-sourcemaps");
var postcss = require("gulp-postcss");
var rucksack = require("rucksack-css");

// Error Handler
var onError = function (err) {
  console.log("An error occurred:", gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit("end");
};

// SASS COMPILING
gulp.task("sassNew", function () {
  var plugins = [rucksack()];

  return gulp
    .src("./sass/*.scss")
    .pipe(plumber({ errorHandler: onError }))
    .pipe(maps.init())
    .pipe(sass())
    .pipe(postcss(plugins))
    .pipe(autoprefixer())
    .pipe(maps.write())
    .pipe(gulp.dest("./")) // Output LTR stylesheets (style.css)
    .pipe(rtlcss()) // Convert to RTL
    .pipe(rename({ basename: "rtl" })) // Rename to rtl.css
    .pipe(gulp.dest("./"));
});

// MINIFY CSS
gulp.task(
  "minifyStyles",
  gulp.series("sassNew", function () {
    return gulp
      .src("style.css")
      .pipe(
        rename({
          suffix: ".min",
        })
      )
      .pipe(minifycss())
      .pipe(gulp.dest("./"));
  })
);

// IMAGES
gulp.task("images", function () {
  return gulp
    .src("./images/src/*")
    .pipe(plumber({ errorHandler: onError }))
    .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
    .pipe(gulp.dest("./images/dist"));
});

// WATCH FILED
gulp.task("watch", function () {
  browserSync.init({
    files: ["./**/*.php", "/*.css", "./js/dist/bundle.js"],
    proxy: "http://localhost/sveikuplaukuvizija",
    notify: false,
  });
  gulp.watch("sass/**/*.scss").on("change", gulp.series("sassNew", reload));
  gulp.watch("js/*.js", gulp.series(reload));
  gulp.watch("images/src/*", gulp.series("images", reload));
});

// BUILD
gulp.task("build", gulp.series("minifyStyles"));

// default task
gulp.task("default", gulp.series(["sassNew", "images", "watch"]));
