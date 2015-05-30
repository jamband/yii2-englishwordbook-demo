// include, init
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

// js
gulp.task('js', function() {
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
    .pipe(gulp.dest('web/js'));
});

// style
gulp.task('style', function() {
  gulp.src([
    'assets/less/_.less',
    'vendor/bower/toastr/toastr.css',
  ])
    .pipe($.plumber())
    .pipe($.less())
    .pipe($.concat('common.css'))
    .pipe($.autoprefixer('last 2 version', 'ie 8'))
    .pipe($.minifyCss())
    .pipe(gulp.dest('web/css'))
    .pipe(reload({stream: true, once: true}));
});

// synchronised browser, watch
gulp.task('serve', function() {
  browserSync({
    notify: false,
    sever: {baseDir: 'web'}
  });

  gulp.watch('assets/less/*.less', ['style']);
  gulp.watch('{controllers,views}/**/*.php', reload);
});

// clean
gulp.task('clean', del.bind(null, [
  'node_modules',
  'runtime/*',
  'tests/codeception/_output/*',
  'vendor',
  'web/assets/*'
]));

// build
gulp.task('build', ['js', 'style']);

// default
gulp.task('default', ['build', 'serve']);
