let gulp = require('gulp');
let sass = require('gulp-sass')(require('sass'));
let uglify = require('gulp-uglify');
let sourcemaps = require('gulp-sourcemaps');

gulp.task('sassFront', function(){
	return gulp.src('src/sass/frontend/style.scss')
	.pipe(sourcemaps.init())
	.pipe(sass())
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('.'));
});

gulp.task('sassBack', function(){
	return gulp.src('src/sass/backend/style-backend.scss')
	.pipe(sourcemaps.init())
	.pipe(sass())
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('.'));
});

gulp.task('js', function() {
	return gulp.src(['src/js/*.js'])
	.pipe(uglify())
	.pipe(gulp.dest('js'));
});

gulp.task('watch', function() {
	gulp.watch('src/js/*.js', gulp.series('js'));
	gulp.watch('src/sass/frontend/**/*.scss', gulp.series('sassFront'));
	gulp.watch('src/sass/backend/**/*.scss', gulp.series('sassBack'));
});


gulp.task('default', gulp.series('sassFront', 'sassBack', 'js', 'watch'));
