var gulp = require('gulp'),
    minifyCSS = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    gutil = require('gulp-util'),
    size = require('gulp-size'),
    rename = require('gulp-rename'),
    watch = require('gulp-watch'),
    bump = require('gulp-bump'),
    svgmin = require('gulp-svgmin');
    del = require('del');
    changed = require('gulp-changed');
    spritesmith = require('gulp.spritesmith');
    // imagemin = require('gulp-imagemin');
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    git = require('gulp-git'),
    argv = require('yargs').argv;

var config = require('./gulp-config.json');

// default task
gulp.task('default');
gulp.task('build', ['clean', 'js', 'css', 'svg']);
gulp.task('test', ['lint']);

// minify css
gulp.task('css', function() {
    var my_config = config.css;

    gulp.src(config.css.assets)
        .pipe(changed(my_config.build_dest))
        .pipe(concat(my_config.filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(minifyCSS({keepSpecialComments:1}))
        .pipe(rename(my_config.min_filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(gulp.dest(my_config.final_dest))
        .pipe(size())
        .on('error', gutil.log)

    console.log('Minify and Combine CSS');
    console.log('Create builds/' + my_config.filename);
    console.log('Create builds/' + my_config.min_filename);
    console.log('Copy to ' + my_config.final_dest + '/' + my_config.min_filename);
});

// minify js
gulp.task('js', function() {
    var my_config = config.js;
    gulp.src(my_config.assets)
        .pipe(changed(my_config.build_dest))
        .pipe(concat(my_config.filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(uglify())
        .pipe(rename(my_config.min_filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(gulp.dest(my_config.final_dest))
        .pipe(size())
        .on('error', gutil.log)

    console.log('Minify and Combine JS');
    console.log('Create builds/' + my_config.filename);
    console.log('Create builds/' + my_config.min_filename);
    console.log('Copy to ' + my_config.final_dest + '/' + my_config.min_filename);
});
gulp.task('js_fitness', function() {
    var my_config = config.js_fitness;
    gulp.src(my_config.assets)
        .pipe(changed(my_config.build_dest))
        .pipe(concat(my_config.filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(uglify())
        .pipe(rename(my_config.min_filename))
        .pipe(gulp.dest(my_config.build_dest))
        .pipe(gulp.dest(my_config.final_dest))
        .pipe(size())
        .on('error', gutil.log)

    console.log('Minify and Combine JS Fitness Module');
    console.log('Create builds/' + my_config.filename);
    console.log('Create builds/' + my_config.min_filename);
    console.log('Copy to ' + my_config.final_dest + '/' + my_config.min_filename);
});

// clean the space and remove everything
gulp.task('clean', function () {
    del(['./builds/'], function (err) {
        console.log('Clean old file in ./builds');
    });
});

// optimized svg
gulp.task('svg', function() {
    var my_config = config.svg;
    return gulp.src(my_config.assets)
        .pipe(changed(my_config.build_dest))
        .pipe(svgmin())
        .pipe(gulp.dest(config.svg.dest));
});

// create css sprite
gulp.task('sprite', function() {
    var spriteData =
        gulp.src('./public/img/icon/*.png') // source path of the sprite images
            .pipe(spritesmith({
                imgName: 'sprite.png',
                imgPath: '../img/sprite.png',
                cssName: 'sprite.css',
            }));

    // output path for the sprite
    spriteData.img
        // .pipe(imagemin())
        .pipe(gulp.dest('./builds/imgs/'))
        .pipe(gulp.dest('./public/img'));

    // output path for the CSS
    spriteData.css
        .pipe(gulp.dest('./builds/css/'))
        .pipe(rename('sprite.min.css'))
        .pipe(minifyCSS({keepSpecialComments:1}))
        .pipe(gulp.dest('./builds/css/'))
        .pipe(gulp.dest('./public/css'));
});

// copy view file from production to local
gulp.task('to_local', function(cb) {
    del(['./app/views/local'], function (err) {
        console.log('Clean old file in views/local');
        console.log('Copy new file from "views/production" to "views/local"');
    });

    gulp.src('./app/views/production/**')
        .pipe(gulp.dest('./app/views/local'));
});

// Bumping the package version 
gulp.task('bump', function () {
    return gulp.src(['./package.json'])
        .pipe(bump())
        .pipe(gulp.dest('./'));
});

// Tagging on git
gulp.task('tag', function () {
  var pkg = require('./package.json');
  var v = 'v' + pkg.version;
  var message = 'Release ' + v;

  return gulp.src('./')
    .pipe(git.commit(message))
    .pipe(git.tag(v, message))
    .pipe(git.push('origin', 'master', '--tags'))
    .pipe(gulp.dest('./'));
});

// JSHint
gulp.task('lint', function () {
  return gulp.src('./public/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(jshint.reporter('fail'));
});