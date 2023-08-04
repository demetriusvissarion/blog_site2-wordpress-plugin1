const path = require("path");
// JS Directory path.
const JS_DIR = path.resolve(__dirname, "src/js");
// const IMG_DIR = path.resolve(__dirname, "src/images");
const BUILD_DIR = path.resolve(__dirname, "build");

// add new .js files here to be compiled
const entry = {
  // app: JS_DIR + "/app.js",
  app: [JS_DIR + "/app.js", JS_DIR + "/form.js"],
  slider: [JS_DIR + "/slider.js"],
};
const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
};

const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
];

module.exports = (env, argv) => ({
  entry: entry,

  output: output,

  /**
   * A full SourceMap is emitted as a separate file ( e.g.  main.js.map )
   * It adds a reference comment to the bundle so development tools know where to find it.
   * set this to false if you don't need it
   */
  devtool: "source-map",

  module: {
    rules: rules,
  },

  externals: {
    jquery: "jQuery",
  },
});
