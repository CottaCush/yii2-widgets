/* Import Node.js modules */
var environments = require('gulp-environments'),
    autoprefixer = require('autoprefixer');


var config = {
    sourceDir: "./src/public-assets/",
    buildDir: "./src/public-assets/",
    styles: {
        sourceDir: "./src/public-assets/less",
        sourceFiles: "./src/public-assets/less/**/*.less",
        destinationDir: "./src/public-assets/css",
        mapsDir: "./maps", // relative to the destination directory
        postcss: [
            autoprefixer({browsers: ["last 5 versions", "> .5% in NG", "not ie < 11"]})
        ]
    },
    scripts: {
        sourceDir: "./src/public-assets/js",
        sourceFiles: ["./src/public-assets/js/**/*.js"],
        destinationDir: "./src/public-assets/js"
    },
    images: {
        sourceDir: "./src/public-assets/img",
        sourceFiles: "./src/public-assets/img/**/*",
        destinationDir: "./src/public-assets/img"
    },
    publicAssets: {
        sourceDir: "",
        sourceFiles: [],
        destinationDir: ""
    },
    bowerAssets: {
        sourceDir: "",
        sourceFiles: [],
        destinationDir: ""
    }
};

/* Add sourcemaps on all environments except production */
config.sourcemaps = !(environments.production());

/* Minify build files on all environments except development */
config.minify = !(environments.development());


module.exports = config;
