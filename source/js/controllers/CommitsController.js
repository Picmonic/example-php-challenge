app.controller('CommitsController', ['$scope', 'CommitsService',
function($scope, CommitsService) {

  $scope.commits = {};
  $scope.message = {
    type : 'info',
    message : 'Loading commits'
  };

  CommitsService.getCommits().then(function(response){
    var data = [];
    var last = '';
    for (var i = 0; i < response.data.length; i++) {
      var datum = response.data[i];
      var lastChar = parseInt(datum.hash.slice(-1));
      var highlight = isNaN(lastChar);
      datum.highlight = !highlight;
      data.push(datum);
      last = datum.modified.split(/[- :]/);
    }
    last = new Date(last[0], last[1]-1, last[2], last[3], last[4], last[5]);
    
    if ((new Date) - last > 1000 * 60 * 10) {
      $scope.message = {
        type : 'warning',
        message : 'Data more than 10 minutes old, consider flushing commits'
      }
    } else {
      $scope.message = {
        type : 'success',
        message : 'Data last fetched ' + last
      }
    }
    $scope.commits = data;
  }, function(error){
    $scope.message = {
      type : 'danger',
      message : 'Could not load commits.  Try the flush commits option and try again.'
    }
  });

}]);
