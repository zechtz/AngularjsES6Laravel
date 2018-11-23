'use strict';

const UglifyJsPlugin =  require('uglifyjs-webpack-plugin');
const ProvidePlugin  =  require('webpack-provide-global-plugin');
const Dotenv         =  require('dotenv-webpack');

const config =  {
  watch   : true,
  context : __dirname + '/public/js',
  entry   : __dirname + '/public/js/app.module.js',
  output : {
    path     : __dirname + '/public/src/',
    filename : 'app.bundle.js'
  },
  module : {
    rules: [
      {test : /\.js$/, loader: 'ng-annotate-loader!babel-loader', exclude: '/node_modules/'},
      {test : /\.html$/, loader: 'raw-loader', exclude : '/node_modules/'},
      {test : /\.css$/, loader: 'style-loader!css-loader', exclude : '/node_modules/'},
      {test : /\.(scss|sass)$/, loader: 'style-loader!css-loader!sass-loader', exclude : '/node_modules/'},
      {test : /\.(eot|ttf|woff|woff2)$/, loader: 'file-loader?name=public/fonts/[hash]-[name].[ext]' },
      /* {test : /\.svg/, exclude: ['/images/'],  loader: 'file-loader?name=public/fonts/[hash]-[name].[ext]'}, */
      {test : /\.(png|jp(e*)g|svg|gif)$/, loader: 'url-loader?name=public/images/[hash]-[name].[ext]'},
      {test : require.resolve('jquery'), use: [{ loader: 'expose-loader', options: 'jQuery' },{ loader: 'expose-loader', options: '$' }]},
      {test : require.resolve('moment'), use: [{ loader: 'expose-loader', options: 'moment' },{ loader: 'expose-loader', options: 'moment' }]}
    ]
  },
  plugins : []
};

config.plugins.push(
  new ProvidePlugin({
    'window.jQuery'  : 'jquery',
    jQuery           : 'jquery',
    $                : 'jquery',
    moment           : 'moment',
    humanizeDuration : 'humanize-duration'
  }),
  new Dotenv()
);

/**
config.plugins.push(
  new UglifyJsPlugin({
    test: /\.js($|\?)/i
  })
); */

module.exports = config;
