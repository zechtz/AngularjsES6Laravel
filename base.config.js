'use strict';

const webpack       =  require('webpack');
const ProvidePlugin =  require('webpack-provide-global-plugin');
const Dotenv        =  require('dotenv-webpack');

const config = {
  entry: {
    app: __dirname + './public/src',
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
    ]
  },

  plugins: [
    new webpack.EnvironmentPlugin([
      'NODE_ENV',
    ]),
  ],
};

module.exports = config;
