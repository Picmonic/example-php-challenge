app.controller('CommitsController', ['$scope', 'CommitsService',
function($scope, CommitsService) {

  $scope.commits = {};

  CommitsService.getCommits().then(function(response){
    var data = [];
    for (var i = 0; i < response.data.length; i++) {
      var datum = response.data[i];
      var lastChar = parseInt(datum.hash.slice(-1));
      var highlight = isNaN(lastChar);
      datum.highlight = !highlight;
      data.push(datum);
    }
    $scope.commits = data;
  });

}]);