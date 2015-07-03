/**
 * Created by Claude on 7/2/2015.
 * Call API Promise Service
 */
(function(){
    'use strict'

angular.module('index.commits.service', []).
    factory('getCommits', ['$http', function($http) {

        return {
            showCommits : function () {
                return $http.get('/api/1/commits').
                    then(function (response) {
                        return response.data;
                    }, function (error) {
                        return error.status + ' : ' + error.data;
                    });
            }
        }
    }]);
})();