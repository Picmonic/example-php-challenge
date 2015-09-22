picmonic.controller("IndexController", ["$scope", "Commits", function($scope, Commits){
	$scope.commits = Commits;
}]);