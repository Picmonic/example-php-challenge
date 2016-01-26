'use strict';

/**
 * @ngdoc function
 * @name picmonicApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the picmonicApp
 */
angular.module('picmonicApp').controller('TidbitsCtrl', function ($scope, gitgetgo) {

    function gitGetCallback(data) {
        $scope.repos = data ;
    } gitgetgo.gitGet(gitGetCallback);



    $scope.checkSha = function (sha) {
        return /^\d+$/.test(sha.substr(sha.length - 1));
    }



});
