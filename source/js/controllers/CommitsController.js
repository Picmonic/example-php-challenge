app.controller('CommitsController', ['$scope', 'CommitsService',
function($scope, CommitsService) {

  $scope.commits = {};

  CommitsService.getCommits().then(function(response){
    $scope.commits = response.data;
  });

}]);