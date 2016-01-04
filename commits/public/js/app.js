/***
 * Here lies the code to get our app created. Let's inject the commit service and controller
 * into it. Good practice as we can keep the app modular and different parts can be
 * extended and tested.
 */
var commitApp = angular.module('commitApp', ['mainCtrl', 'commitService']);