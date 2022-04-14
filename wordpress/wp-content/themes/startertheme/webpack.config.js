const path = require("path");

module.exports = {
  mode: "development",
  entry: {
    hero: "./blocks/hero/index.jsx",
    section: "./blocks/section/index.jsx",
    sectionmessages: "./blocks/sectionmessages/index.jsx",
    lastposts: "./blocks/lastposts/index.jsx",
    categories: "./blocks/categories/index.jsx",
  },
  output: {
    filename: "[name].js",
    path: __dirname + "/blocks/build",
  },
  module: {
    rules: [
      {
        test: /.jsx?$/,
        loader: "babel-loader",
        exclude: /node_modules/,
      },
    ],
  },
};
