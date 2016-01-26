'use strict';
/**
 * @ngdoc overview
 * @name Router
 * @description
 * # Router
 *
 * Router module of the application. All routes for the application are defined here.
 */
angular.module('routing', ['ui.router']).config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider.state('main', {
        url: '/',
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
    }).state('tidbits', {
        url: '/tidbits',
        templateUrl: 'views/tidbits.html',
        controller: 'TidbitsCtrl'
    })
});