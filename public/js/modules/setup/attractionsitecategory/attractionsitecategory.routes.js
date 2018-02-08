'use strict';

routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('attraction-site-categories', {
      url        : '/attraction-site-categories',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'AttractionSiteCategoryController as vm'
    });
}
