angular.module('mainCtrl', [])

    // inject Commit service
    .controller('mainController', function($scope, $http, Commit) {
        $scope.commitData = {};

        $scope.loading = true;

        Commit.get()
            .success(function(data) {
                $scope.commits = data;

                $scope.loading = false;
            });

        /***
         *
         * @param sha
         *
         * If the last character in the SHA string is a number, set the row color
         * to light blue #E6F1F6
         *
         */
        $scope.set_hash_color = function (sha) {
            var lastChar = sha.substr( sha.length-1 );
            //$lastChar = commit.hash.substr(-1, 0);

            //if ( parseInt(lastChar) != 'NaN'  ) {
            if ( parseInt(lastChar) > 0  ) {
                return { "background-color" : "#E6F1F6" }
            }
        }

        // this is awful, but it needs to get out the door. In the future replace with $state.reload or $route.reload
        $scope.reloadPage = function () {
            window.location.reload();
        }

    })