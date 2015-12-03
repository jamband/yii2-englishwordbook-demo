// include, init
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

// scripts
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
    .pipe($.minifyCss())
    .pipe(gulp.dest('web/css'))
    .pipe($.gzip())
    .pipe(gulp.dest('web/css'))
    .pipe(reload({stream: true, once: true}));
});

// synchronised browser, watch
gulp.task('serve', function() {
  browserSync({
    notify: false,
    sever: {baseDir: 'web'}
  });

  gulp.watch('assets/less/**/*.less', ['styles']);
  gulp.watch('{controllers,views}/**/*.php', reload);
});

// clean
gulp.task('clean', function(cb) {
  del([
    'node_modules',
    'runtime/*',
    'tests/codeception/_output/*',
    'tests/codeception/_support/_generated/*',
    'vendor',
    'web/assets/*'
  ], cb);
});

// build
gulp.task('build', ['scripts', 'styles']);

// default
gulp.task('default', ['build', 'serve']);
