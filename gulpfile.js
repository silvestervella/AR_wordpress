var gulp = require('gulp'),
    newer = require('gulp-newer'),
    changed = require('gulp-changed'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    minifyCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require( 'gulp-util' ),
// var ftp = require( 'vinyl-ftp' ),  
    sftp = require('gulp-sftp'),  // If FTP uncomment above
    cache = require('gulp-cached');

var localChildDir = 'app/wp-content/themes/html5blank-stable-child',
    serverChildDir = 'wp-content/themes/html5blank-stable-child';

var globs = [
    localChildDir + '/**/*.css',
    localChildDir + '/js/*.js',
    localChildDir + '/*.php'
];

// Front End Styles
gulp.task('styles', function(){
    return gulp.src('scss/all.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest(localChildDir + '/css'))
});

// Admin Styles
gulp.task('admin', function(){
    return gulp.src('scss/admin-style.scss')
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(gulp.dest(localChildDir + '/css'))
});

// Scripts
gulp.task('scripts', function() {
  gulp.src('js/*.js')
  .pipe(uglify())
    .pipe(concat('script.js'))
    .pipe(gulp.dest(localChildDir + '/js'))
});

// Theme Files
gulp.task('theme', function(){
    return gulp.src('theme_files/*.php')
    .pipe( newer( localChildDir ) )
    .pipe( gulp.dest( localChildDir ) );
});

// Deploy To Server (FTP) 
/*
gulp.task( 'deployftp', function () {
    var conn = ftp.create( {
        host:     '',
        user:     '',
        password: '',
        parallel: 10,
        log:      gutil.log
    } );

	return gulp.src( globs, { base: localChildDir, buffer: false } )
		.pipe( conn.newer( serverChildDir ) ) // Dir on server
		.pipe( conn.dest( serverChildDir ) ); // Dir on server

});

// Deploy To Server (SFTP) 
gulp.task('deploysftp', function(){
	return gulp.src( globs, { base: localChildDir, buffer: false } )
    .pipe(changed(serverChildDir))
    .pipe(cache('linting'))
    .pipe(gulp.dest(serverChildDir))
            .pipe(sftp({
                host:     'eternagames.com',
                user:     'eter41859568171',
                password: 'zZW5W{obRXV',
                remotePath: serverChildDir
            }));
});
*/