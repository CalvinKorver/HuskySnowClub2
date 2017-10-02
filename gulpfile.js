'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var htmlmin = require('gulp-htmlmin');


gulp.task('workflow', ['pages', 'index'], function () {
	gulp.src('./assets/sass/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		// .pipe(autoprefixer({
		// 	browsers: ['last 2 versions'],
		// 	cascade: false
		// }))
		// .pipe(cssnano())
		// .pipe(sourcemaps.write('./'))

	.pipe(gulp.dest('assets/css/'))
});

gulp.task('pages', function () {
	gulp.src('src/html/pages/*.html')
	.pipe(htmlmin({collapseWhitespace: true}))
	.pipe(gulp.dest('./pages/'))
});

gulp.task('index', function() {
	gulp.src('src/html/index.html')
	.pipe(htmlmin({collapseWhitespace: true}))
	.pipe(gulp.dest('./'))
});


gulp.task('watch', function () {
	gulp.watch('./assets/sass/**/*.scss', ['workflow']);
});

gulp.task('default', ['workflow', 'watch']);