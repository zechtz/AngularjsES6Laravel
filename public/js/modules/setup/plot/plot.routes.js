'use strict';

routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {

  $stateProvider
    .state('plots', {
      url        : '/plots',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'PlotController as vm'
    });
}
