/**
 * Created by Claude on 7/2/2015.
 *
 * Call service to commits and check to see if commit id ends in number.
 */

(function(){
    'use strict'

angular.module('index.commits.controller', ['index.commits.service']).
    controller('showBrags',['getCommits','$scope','$location',
        function(getCommits, $scope, $location){
            var brags = getCommits.showCommits().
                then(function(response){
                    $scope.commits = response;
                });

            $scope.endsWith = function(str) {
                var reg = /\d+$/,
                    result = str.substring(str.length-1);

                return result.match(reg) ? true : false;
            };



    }]);

})();