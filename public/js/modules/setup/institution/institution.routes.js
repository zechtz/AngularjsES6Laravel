routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('institutions', {
      url: '/institutions',
      template: require('./views/index.html'),
      controller: 'InstitutionController as vm'
    });
}
