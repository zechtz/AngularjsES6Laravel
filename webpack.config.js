module.exports = {
  context : __dirname + '/public/js',
  entry : './app.module.js',
  output : {
    path: __dirname + '/public/js',
    filename : 'app.bundle.js'
  }
};
