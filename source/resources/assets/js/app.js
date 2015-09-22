var picmonic = angular.module('Picmonic', [
	'ngRoute'
]);
picmonic.config(['$routeProvider', '$locationProvider',
	function($routeProvider, $locationProvider){
		$routeProvider.
			when('/', {
				templateUrl:'/partials/index.html',
				controller: 'IndexController'
			});
		$locationProvider.html5Mode(true);
	}
]);
picmonic.value("Commits", window.commits);