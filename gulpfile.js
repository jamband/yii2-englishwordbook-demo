'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');

gulp.task('scripts', function() {
  gulp.src([
    'vendor/bower/jquery/dist/jquery.js',
    'vendor/bower/bootstrap/dist/js/bootstrap.js',
    'vendor/yiisoft/yii2/assets/**/*.js',
    'vendor/bower/yii2-pjax/jquery.pjax.js',
    'vendor/bower/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js',
    'vendor/bower/toastr/toastr.js',
  ])
    .pipe($.concat('common.js'))
    .pipe($.uglify({preserveComments: 'some'}))
    .pipe(gulp.dest('web/js'))
    .pipe($.gzip())
    .pipe(gulp.dest('web/js'));
});

// styles
gulp.task('styles', function() {
  gulp.src([
    'assets/less/common.less',
    'vendor/bower/toastr/toastr.css',
  ])
    .pipe($.plumber())
    .pipe($.less())
    .pipe($.concat('common.css'))
    .pipe($.autoprefixer({browsers: ['last 2 versions']}))
    .pipe($.cssnano())
    .pipe(gulp.dest('web/css'))
    .pipe($.gzip())
    .pipe(gulp.dest('web/css'));
});

gulp.task('clean', function() {
  del(['node_modules', 'runtime/*', 'vendor', 'web/assets/*']);
});

gulp.task('build', ['scripts', 'styles']);

gulp.task('default', ['build'], function() {
  gulp.watch('assets/less/**/*.less', ['styles']);
  gulp.watch('{controllers,views}/**/*.php', reload);
});
