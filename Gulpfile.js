// Created by Vahid Amiri Motlagh <vahid.a1996@gmail.com>
// https://github.com/vsg24

"use strict";

var gulp = require("gulp"),
    rimraf = require("rimraf"),
    concat = require("gulp-concat"),
    cleanCSS  = require("gulp-clean-css"),
    rename = require("gulp-rename"),
    uglify = require("gulp-uglify");

// admin area rules start

var wwwroot = "./wwwroot/";
var libDest = wwwroot + "lib/";
// Include names of the node packages from /node_modules that you want copied to /wwwroot/lib
var node_modules_to_copy = [];

var adminPaths = {
    webroot: wwwroot + "admin/"
};

adminPaths.jsPath = adminPaths.webroot + "js/";
adminPaths.jsFiles = adminPaths.jsPath + "**/*.js";
adminPaths.cssPath = adminPaths.webroot + "css/";
adminPaths.cssFiles = adminPaths.cssPath + "**/*.css";

gulp.task("adminClean:css", function (cb) {
    rimraf(adminPaths.cssPath + "**/*.min.css", cb);
});

gulp.task("adminClean:js", function (cb) {
    rimraf(adminPaths.jsPath + "**/*.min.js", cb);
});

gulp.task("adminMin:js", function () {
    return gulp.src(adminPaths.jsFiles)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(adminPaths.jsPath));
});

gulp.task("adminMin:css", function () {
    return gulp.src(adminPaths.cssFiles)
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(adminPaths.cssPath));
});

// If you get events.js:160 Unhandled 'error' event, just run the task again
gulp.task("adminMin", ["adminClean:js", "adminMin:js", "adminClean:css", "adminMin:css"]);

// admin area rules end

var frontPaths = {
    webroot: "./wwwroot/front/"
};

frontPaths.jsPath = frontPaths.webroot + "js/";
frontPaths.jsFiles = frontPaths.jsPath + "**/*.js";
frontPaths.cssPath = frontPaths.webroot + "css/";
frontPaths.cssFiles = frontPaths.cssPath + "**/*.css";

gulp.task("frontClean:css", function (cb) {
    rimraf(frontPaths.cssPath + "**/*.min.css", cb);
});

gulp.task("frontClean:js", function (cb) {
    rimraf(frontPaths.jsPath + "**/*.min.js", cb);
});

gulp.task("frontMin:js", function () {
    return gulp.src(frontPaths.jsFiles)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(frontPaths.jsPath));
});

gulp.task("frontMin:css", function () {
    return gulp.src(frontPaths.cssFiles)
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(frontPaths.cssPath));
});

// If you get events.js:160 Unhandled 'error' event, just run the task again
gulp.task("frontMin", ["frontClean:js", "frontMin:js", "frontClean:css", "frontMin:css"]);

// Copy the selected modules in "node_modules_to_copy" array to "lib" folder in public area
gulp.task('copySelectedNodeModules', function () {
    node_modules_to_copy.forEach(function(element, index, array) {
        return gulp
            .src([
                'node_modules/' + element + '/**/*'
            ])
            .pipe(gulp.dest(libDest + element));
    });
});