var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('autoprefixer-core');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var postcss = require('gulp-postcss');

gulp.task('browser-sync', function() {
  var files = [
    './js/**/*.{js,coffee}',
    './styles/*.scss',
    './*.php'
  ];
   //initialize browsersync
    browserSync.init(files, {
      debugInfo: true,
      logConnections: true,
      ghostMode: {
        scroll: true,
        links: true,
        forms: true
      }
    });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('images', function(){
  gulp.src('src/images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('dist/images/'));
});

gulp.task('styles', function(){
  var processors = [
      autoprefixer({browsers: ['last 1 version']})
  ];

  gulp.src(['./**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('scripts', function(){
  return gulp.src('src/scripts/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('dist/scripts/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('default', ['browser-sync'], function(){
  gulp.watch("./**/*.scss", ['styles']);
  gulp.watch("./js/**/*.js", ['scripts']);
  gulp.watch("*.html", ['bs-reload']);
});