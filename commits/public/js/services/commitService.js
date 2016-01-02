angular.module('commitService', [])

.factory('Commit', function($http) {
    return {
        // get all the commits
        get : function() {
            return $http.get('/api/commits');
        }

        /***
         * Could do the github api stuff here and send back via route
         * for Laravel endpoint to deal with, but let's keep github api
         * routines in laravel for now.
         *
         * save : function(commitData ... etc etc ...){},
         *
         */
    }
});