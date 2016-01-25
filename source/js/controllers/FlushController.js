app.controller('FlushController', ['$scope', 'CommitsService',
function($scope, CommitsService) {

  $scope.flushMessage = {
    type: 'info',
    message: 'Flushing database'
   };

  CommitsService.flushCommits().then(function(response){
    $scope.flushMessage = {
      type: 'success',
      message: 'Database flushed!'
    };
  });
  
}]);