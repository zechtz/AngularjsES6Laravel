'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider'];

export default function routes($stateProvider, $mdThemingProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('blue')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $stateProvider
    .state('gfs-categories', {
      url        : '/gfs-categories',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'GfsCategoryController as vm'
    });
}
