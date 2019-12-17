var gulp = require('gulp');
var sass = require('gulp-sass');

//style paths
var sassFiles = './*.scss',
    cssDest = './';

gulp.task('styles', function(){
    gulp.src(sassFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(cssDest));
});

gulp.task('watch', () => {
    gulp.watch(sassFiles, (done) => {
        gulp.series([ 'styles'])(done);
    });
});

gulp.task('default', gulp.series([ 'styles']));
