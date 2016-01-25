app.factory('CommitsService', ['$http',
function($http) {

  var getCommits = function() {
    var req = {
      method: 'GET',
      url: 'WEBROOT/source/api/index.php/commits/list'
    }
    return $http(req).then(
      function(response){
        return response;
      }
    );
  }
  
  var flushCommits = function() {
    var req = {
      method: 'GET',
      url: 'WEBROOT/source/api/index.php/commits/flush'
    }
    return $http(req).then(
      function(response){
        return response;
      }
    );
  }

  return {
    getCommits: getCommits,
    flushCommits: flushCommits
  };

}]);
