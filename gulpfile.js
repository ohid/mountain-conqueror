const { src, dest, series, parallel, watch } = require('gulp');
const sass = require('gulp-sass'),
      sourcemaps = require('gulp-sourcemaps'),
      uglify = require('gulp-uglify'),
      uglifycss = require('gulp-uglifycss');

const files = {
    scssPath: {
        src: 'assets/scss/*.scss',
        dest: 'assets/css/'
    },
    jsPath: 'assets/js/*.js',
}

/**
 * SCSS Task
 * Converts the SCSS files to CSS and minify them
 */
function scssTask(){    
    return src(files.scssPath.src)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(uglifycss())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(files.scssPath.dest)
    );
}

/**
 * JS Task
 * Minifies the JS files
 */
function jsTask(){
    return src('assets/js/*.js')
        .pipe(uglify())
        .pipe(dest('assets/js/build/')
    );
}

/**
 * Watch Task
 * Watch for changes on scss and js files
 */
function watchTask(){
    watch(
        [files.scssPath.src, files.jsPath],
        parallel(scssTask, jsTask)
    );
}

exports.watchTask = watchTask;
exports.default = series( scssTask, jsTask, watchTask);