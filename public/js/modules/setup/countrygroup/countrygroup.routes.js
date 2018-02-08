'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider'];

export default function routes($stateProvider, $mdThemingProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('blue')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $stateProvider
    .state('country-groups', {
      url        : '/country-groups',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'CountryGroupController as vm'
    });
}
