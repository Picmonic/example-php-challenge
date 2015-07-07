angular.module('GithubApp', [
   'GithubApp.controllers',
   'GithubApp.services',
   'ngRoute'
]).config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/commits', {
            templateUrl: 'partials/commits.html',
            controller: 'commitsController'
        })
        .when('/commits/:author', {
            templateUrl: 'partials/author-commits.html',
            controller: 'authorController'
        })
        .otherwise({
            redirectTo: '/commits'
        });
}]);