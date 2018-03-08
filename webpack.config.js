'use strict';

const UglifyJsPlugin =  require('uglifyjs-webpack-plugin');

const config =  {
  watch: true,
  context : __dirname + '/public/js',
  entry : __dirname + '/public/js/app.module.js',
  output : {
    path     : __dirname + '/public/src/js/',
    filename : 'app.bundle.js'
  },
  module : {
    loaders : [
      {test : /\.js$/, loader: 'ng-annotate-loader!babel-loader', exclude: '/node_modules/'},
      {test : /\.html$/, loader: 'raw-loader', exclude : '/node_modules/'},
      {test : /\.css$/, loader: 'style-loader!css-loader', exclude : '/node_modules/'},
      {test : /\.scss$/, loader: 'style-loader!css-loader!sass-loader', exclude : '/node_modules/'},
      {test : /\.(eot|svg|ttf|woff|woff2)$/, loader: 'file-loader?name=public/fonts/[name].[ext]' },
      {test : /\.(gif|png|jpe?g|svg)$/i, loader: 'image-webpack-loader', options: {
        mozjpeg: {
          progressive: true,
          quality: 65
        },
        // optipng.enabled: false will disable optipng
        optipng: {
          enabled: false,
        },
        pngquant: {
          quality: '65-90',
          speed: 4
        },
        gifsicle: {
          interlaced: false,
        },
        // the webp option will enable WEBP
        webp: {
          quality: 75
        }
      }
      }
    ]
  },
  plugins : []
};

config.plugins.push(
  new UglifyJsPlugin({
    test: /\.js($|\?)/i
  })
);

module.exports = config;
