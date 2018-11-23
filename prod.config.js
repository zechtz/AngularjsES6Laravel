'use strict';

const webpack           = require('webpack');
const merge             = require('webpack-merge');
const UglifyJsPlugin    = require('uglifyjs-webpack-plugin');
const baseConfig        = require('./base.config.js');
const ProvidePlugin     = require('webpack-provide-global-plugin');
const Dotenv            = require('dotenv-webpack');
const CrudeTimingPlugin = require('./crude-timing');

const config = merge(baseConfig, {
  watch   : false,
  devtool: 'source-map',
  context : __dirname + '/public/js',
  entry   : __dirname + '/public/js/app.module.js',
  output : {
    path     : __dirname + '/public/src/',
    filename : 'app.bundle.js'
  },

  module : {
    rules: [
      {test : require.resolve('jquery'), use: [{ loader: 'expose-loader', options: 'jQuery' },{ loader: 'expose-loader', options: '$' }]},
      {test : require.resolve('moment'), use: [{ loader: 'expose-loader', options: 'moment' },{ loader: 'expose-loader', options: 'moment' }]}
    ]
  }
});

config.plugins.push(
  new ProvidePlugin({
    'window.jQuery'  : 'jquery',
    jQuery           : 'jquery',
    $                : 'jquery',
    moment           : 'moment',
    humanizeDuration : 'humanize-duration'
  }),
  new CrudeTimingPlugin(),
  new UglifyJsPlugin({
    test: /\.js($|\?)/i,
    parallel: true,
    sourceMap: true
  }),
  new Dotenv()
);

module.exports = config;
