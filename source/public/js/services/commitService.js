angular.module('commitService', [])

.factory('Commit', function($http) {

    return {
        // get all the comments
        get : function() {
            return $http.get('/api/commits');
        },
    }

});