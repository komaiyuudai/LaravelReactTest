var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var gulp = require('gulp');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var reactify = require('reactify');
var notify = require('gulp-notify');

gulp.task('member_use_service', function(){
	var b = browserify({
		entries: ['./public/js/member_use_service/index.jsx'],
		transform: [reactify]
	});
	return b.bundle()
		.pipe(source('member_use_service.js'))
		.pipe(gulp.dest('./public/js/dist/'));
});

// watchタスクで監視
gulp.task('watch', function(){
	// 監視するファイルと実行したいタスク名を指定
	gulp.watch('./public/js/member_use_service/index.jsx', ['member_use_service']);
    gulp.watch('./public/js/member_use_service/form/member_use_service_form.jsx', ['member_use_service']);
})

gulp.task('default', ['watch']);

