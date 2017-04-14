var debug = process.env.NODE_ENV !== "production";
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var path = require("path");


module.exports = {
  context: __dirname,
  devtool: debug ? "inline-sourcemap" : false,
  entry: "./src/main.js",
  output: {
    path: __dirname + "/dist/js",
    filename: "bundle.min.js"
  },
  module:{
    loaders:[
      {
        test:/\.js$/,
        exclude:/(node_modules|bower_components)/,
        loader:'babel-loader',
        query:{
          presets:['es2015']
        }
      },
      {
        test:/\.scss$/,
        loader:ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: 'css-loader!postcss-loader!sass-loader',
        })
      },
      {
        test:/\.css$/,
        loader:ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: 'css-loader',
        })
      },
      {
        test: /\.(jpg|jpeg|png|gif)$/,
        loader: 'url-loader'
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2)$/,
        loader: 'url-loader'
      }
    ]
  },
  plugins: debug ? [
    new ExtractTextPlugin("../../style.css"),
  ] : [
    new ExtractTextPlugin("../../style.css"),
    new webpack.optimize.OccurrenceOrderPlugin(),
    new webpack.optimize.UglifyJsPlugin({ mangle: false, sourcemap: false }),
  ]
}
