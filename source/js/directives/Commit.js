app.directive('commit', [
function() {
  return {
  	restrict: 'E',
    scope: {
      commit: '='
    },
    templateUrl: 'js/directives/Commit.html',
  };
}]);