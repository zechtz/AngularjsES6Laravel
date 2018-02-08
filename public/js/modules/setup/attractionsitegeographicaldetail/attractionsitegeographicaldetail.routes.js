'use strict';

routes.$inject = ['$stateProvider', '$mdThemingProvider'];

export default function routes($stateProvider, $mdThemingProvider) {
  $stateProvider
    .state('attraction-site-geographical-details', {
      url        : '/attraction-site-geographical-details',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'GeographicalDetailController as vm'
    });
}
