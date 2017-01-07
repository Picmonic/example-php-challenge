function gitCommitsService($http){
    var service = {};
    service.getCommits = function(){
        return $http.get('/api/commits').then(function(rsp){
            return rsp.data;
        })
    };
    return service;
}

angular.module('gitlogs').factory('gitCommitsService', gitCommitsService);