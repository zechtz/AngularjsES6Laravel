'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider'];

export default function routes($stateProvider, $mdThemingProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('blue')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $stateProvider
    .state('institutions', {
      url        : '/institutions',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'InstitutionController as vm'
    });
}
