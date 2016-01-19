angular.module('mainController', [])

// inject the Comment service into our controller
.controller('mainController', function($scope, $http, Commit) {
    $scope.commitData = {};
    $scope.loading = true;

    Commit.get()
        .success(function(data) {
            $scope.commits = data;
            $scope.loading = false;
        });
});