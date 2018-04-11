'use strict';

const UglifyJsPlugin =  require('uglifyjs-webpack-plugin');

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
      {test : /\.(eot|svg|ttf|woff|woff2)$/, loader: 'file-loader?name=public/fonts/[hash]-[name].[ext]' },
      {test : /\.(png|jp(e*)g|svg)$/, loader: 'url-loader?name=public/images/[hash]-[name].[ext]'},
    ]
  },
  plugins : []
};

module.exports = config;
