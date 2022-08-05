const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');

const isProduction = 'production' === process.env.NODE_ENV;

const entries = {
  "frontend": ['./assets/js/main.js', './assets/styles/main.css'],
  "driver": './includes/blocks/driver/index.js',
  "core-block-overrides": './includes/core-block-overrides.js',
};

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
};

const jsRules = {
  test: /\.m?js$/,
  exclude: /node_modules/,
  use: {
    loader: 'babel-loader',
    options: {
      presets: ['@babel/preset-env', '@babel/preset-react'],
      cacheDirectory: true,
      sourceMap: ! isProduction,
    },
  },
};

module.exports = {
  mode: 'development',
	devtool: isProduction ? 'source-map' : 'inline-cheap-module-source-map',

  // Entry Points
  entry: entries,

  // Output
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/[name]/[name]-bundle.js'
  },

  // Stats
  stats: {
    all: false,
    errors: true,
    modules: true,
    warnings: true,
    assets: true,
    errorDetails: true,
    excludeAssets: /\.(jpe?g|png|gif|svg|woff|woff2)$/i,
    performance: true
  },

  performance: {
    maxAssetSize: 100000
  },

  // Plugins
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
      chunkFilename: '[id].css',
    }),
    new BrowserSyncPlugin({
      files: [
        '**/*.php',
        'dist/*.js',
        'dist/*.css'
      ],
      proxy: 'http://localhost:10003/',
      open: false
    }),
		new DependencyExtractionWebpackPlugin(),
  ],

  // Build rules to handle asset files.
  module: {
    rules: [

      // Scripts
      jsRules,

      // Styles
      cssRules,
    ],
  },
}
