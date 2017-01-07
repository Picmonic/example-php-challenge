function gitCommitsService($http){
    var service = {};
    service.getCommits = getCommits;
    service.getNewCommits = getNewCommits;

    // on service load, perform a refresh of commits to enforce loading of latest
    getNewCommits();


    function getCommits(){
        return $http.get('/api/commits').then(function(rsp){
            return rsp.data;
        });
    }

    function getNewCommits(){
        return $http.get('/api/commits/new').then(function(rsp){
            return rsp.data;
        });
    }

    return service;

}

angular.module('gitlogs').factory('gitCommitsService', gitCommitsService);