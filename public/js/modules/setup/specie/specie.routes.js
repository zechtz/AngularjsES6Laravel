'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider'];

export default function routes($stateProvider, $mdThemingProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('blue')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $stateProvider
    .state('species', {
      url        : '/species',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'SpecieController as vm'
    });
}
