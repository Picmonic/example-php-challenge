var app = angular.module('app', []);

app.controller('Main', function($scope, $http) {
	var ctrl = this;

 	ctrl.endsWithNumber = function(sha){
    return !!parseInt(sha.split('').pop())
  }
    ctrl.commits = []

    $http.get("https://api.github.com/repos/nodejs/node/commits")
    .success(function(response) {$scope.gitdata = response;});
});