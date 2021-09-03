const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const isProduction = 'production' === process.env.mode;

const cssRules = {
  test: /\.css$/,
  use: [
    {
      loader: MiniCssExtractPlugin.loader,
    },
    {
      loader: 'css-loader',
      options: {
        sourceMap: !isProduction,
      },
    },
    {
      loader: 'postcss-loader',
      options: {
        sourceMap: !isProduction,
      },
    },
  ],
}


module.exports = {
  mode: 'development',
  devtool: 'eval-cheap-source-map',
  entry: {
    frontend: ['./assets/js/main.js', './assets/styles/main.css'],
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name]-bundle.js'
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[id].css',
    }),
    new BrowserSyncPlugin({
      files: '**/*.php',
      proxy: 'http://localhost:10003/'
    })
  ],
  optimization: {
    minimizer: [new UglifyJsPlugin()]
  },
  // Build rules to handle asset files.
  module: {
    rules: [
      
      // Styles
      cssRules,
    ],
  },
}
