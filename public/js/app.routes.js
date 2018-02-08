'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider', '$urlRouterProvider'];

export default function routes($stateProvider, $mdThemingProvider, $urlRouterProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('green')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $urlRouterProvider.otherwise('/institutions');

  $stateProvider
    .state('root', {
      abstract    : true,
      views: {
        '@': {
          template : require('./modules/layouts/app-dashboard.html'),
        },
        '@sidebar': {
          template : require('./modules/layouts/shared/sidebar.html')
        },
        '@toolbar': {
          template : require('./modules/layouts/shared/top-toolbar.html')
        }
      }
    });
}
