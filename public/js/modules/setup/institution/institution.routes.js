routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('institutions', {
      url        : '/institutions',
      template   : require('./views/index.html'),
      parent     : 'root',
      controller : 'InstitutionController as vm'
    })
    .state('institutions.new', {
      url        : '/institutions/new',
      template   : require('./views/index.html'),
      controller : 'InstitutionController as vm'
    })
    .state('attractions', {
      url        : '/institutions/new',
      parent     : 'root',
      template   : require('./views/index.html'),
      controller : 'InstitutionController as vm'
    });
}
