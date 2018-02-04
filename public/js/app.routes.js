routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
    $stateProvider
    .state('home', {
        url : '/',
        template : require('./modules/layouts/app-dashboard.html'),
        controller : 'HomeController',
        controllerAs : 'home'
    });
}
