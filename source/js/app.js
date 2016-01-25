var app = angular.module('ExamplePhpChallenge', 
['ngRoute', 'ui.bootstrap'], 
function() {
});
app.config(function($routeProvider) {
  $routeProvider
  	.when('/', {
  		controller: 'HomeController',
  		templateUrl: 'views/home.html'
  	})
    .when('/commits', {
      controller: 'CommitsController',
      templateUrl: 'views/commits.html'
    })
    .when('/flush', {
      controller: 'FlushController',
      templateUrl: 'views/flush.html'
    })
    .otherwise({
      redirectTo: '/'
    })
});