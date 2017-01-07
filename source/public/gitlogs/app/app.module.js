angular
    .module('gitlogs', [
        'ui.router',
        'ui.bootstrap'
    ])
    .config(config);


function config($stateProvider, $urlRouterProvider, $locationProvider) {
    $urlRouterProvider
        .otherwise('/');

    $stateProvider
        .state('gitlogs', {
            url: '',
            abstract: true,
            views: {
                'header': {
                    templateUrl: 'gitlogs/app/layout/header.html'
                },
                'footer': {
                    templateUrl: 'gitlogs/app/layout/footer.html'
                }
            }
        })
        .state('gitlogs.nodejs', {
            url: '/',
            views: {
                'container@': {
                    templateUrl: 'gitlogs/app/nodejs/list.html',
                    controller:'NodeJsListController',
                    controllerAs:'vm',
                }
            }
        }
    );

    $locationProvider.html5Mode(true);
}