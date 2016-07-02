// Created by Vahid Amiri Motlagh <vahid.a1996@gmail.com>
// https://github.com/vsg24

"use strict";

var gulp = require("gulp"),
    rimraf = require("rimraf"),
    concat = require("gulp-concat"),
    cssmin = require("gulp-cssmin"),
    rename = require("gulp-rename"),
    uglify = require("gulp-uglify");

// admin area rules start

var wwwroot = "./wwwroot/";
var libDest = wwwroot + "lib/";
var node_modules_to_copy = ['jquery'];

var adminPaths = {
    webroot: wwwroot + "admin/"
};

adminPaths.js = adminPaths.webroot + "js/**/*.js";
adminPaths.minJs = adminPaths.webroot + "js/";
adminPaths.css = adminPaths.webroot + "css/**/*.css";
adminPaths.minCss = adminPaths.webroot + "css/";

gulp.task("adminMin:js", function () {
    return gulp.src(adminPaths.js)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(adminPaths.minJs));
});

gulp.task("adminMin:css", function () {
    return gulp.src(adminPaths.css)
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(adminPaths.minCss));
});

gulp.task("adminMin", ["adminMin:js", "adminMin:css"]);

// admin area rules end

var frontPaths = {
    webroot: "./wwwroot/front/"
};

frontPaths.js = frontPaths.webroot + "js/**/*.js";
frontPaths.minJs = frontPaths.webroot + "js/";
frontPaths.css = frontPaths.webroot + "css/**/*.css";
frontPaths.minCss = frontPaths.webroot + "css/";

gulp.task("frontMin:js", function () {
    return gulp.src(frontPaths.js)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(frontPaths.minJs));
});

gulp.task("frontMin:css", function () {
    return gulp.src(frontPaths.css)
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(frontPaths.minCss));
});

gulp.task("frontMin", ["frontMin:js", "frontMin:css"]);

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