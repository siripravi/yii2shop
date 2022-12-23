'use strict';
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass')(require('sass'));
sass.compiler = require('sass');
gulp.task('sass', (done)  => {
    return gulp.src("./sass/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("dist/"))
        .pipe(browserSync.stream());
});
gulp.task('start', gulp.series('sass', async function() {
    browserSync.init({
        server: "./"
    });

    gulp.watch("sass/*.scss", gulp.series('sass'));
    gulp.watch("./*.html").on('change', browserSync.reload);
}));
gulp.task('default', gulp.series('start'));
