app.factory('CommitsService', ['$http',
function($http) {

  var getCommits = function() {
    return 'Commit';
  }

  return {
    getCommits: getCommits
  };

}]);