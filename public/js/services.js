angular.module('GithubApp.services', [])
    .factory('apiService', ['$http', function($http) {
    
        var o = {};
        
        o.getCommits = function() {
            return $http({
                method: 'GET',
                url: 'http://localhost:8080/commits'
            });
        };
        
        o.getAuthorCommits = function(author) {
            return $http({
                method: 'GET',
                url: 'http://localhost:8080/commits/' + author
            });
        };
        
        return o;
    }]);