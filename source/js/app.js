var app = angular.module('ExamplePhpChallenge', 
['ngRoute'], 
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
    .otherwise({
      redirectTo: '/'
    })
});