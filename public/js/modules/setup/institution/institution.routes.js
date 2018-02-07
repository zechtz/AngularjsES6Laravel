'use strict';

routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('institutions', {
      url        : '/institutions',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'InstitutionController as vm'
    });
}
