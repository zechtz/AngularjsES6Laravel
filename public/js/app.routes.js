routes.$inject = ['$stateProvider', '$mdThemingProvider', '$urlRouterProvider'];

export default function routes($stateProvider, $mdThemingProvider, $urlRouterProvider) {

  $mdThemingProvider.theme('default')
    .primaryPalette('blue')
    .accentPalette('indigo')
    .warnPalette('red')
    .backgroundPalette('grey');

  $urlRouterProvider.otherwise('/');

  $stateProvider
    .state('root', {
      abstract    : true,
      views: {
        '@': {
          templateUrl : 'js/modules/layouts/app-dashboard.html',
        },
        '@sidebar': {
          templateUrl : 'js/modules/layouts/shared/sidebar.html'
        },
        '@toolbar': {
          templateUrl : 'js/modules/layouts/shared/top-toolbar.html'
        }
      }
    });
}
