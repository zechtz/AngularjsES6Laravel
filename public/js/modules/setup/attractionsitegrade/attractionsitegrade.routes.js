'use strict';

routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {

  $stateProvider
    .state('attraction-site-grades', {
      url        : '/attraction-site-grades',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'AttractionSiteGradeController as vm'
    });
}
