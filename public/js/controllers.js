angular.module('GithubApp.controllers', [])
    .controller('commitsController', function($scope, apiService) {

        $scope.commits = [];

        apiService.getCommits().success(function(response) {
           $scope.commits = response; 
        });
    })
    .controller('authorController', function($scope, $routeParams, apiService) {
        
        $scope.commits = [];
        $scope.author = $routeParams.author;

        $scope.hilite = function(str) {
            return isNaN(str.slice(-1)) ? '' : 'blue';
        }

        apiService.getAuthorCommits($scope.author).success(function(response) {
            console.log(response);            
            $scope.commits = response.commits;
            $scope.author = response.author;
        });
    });