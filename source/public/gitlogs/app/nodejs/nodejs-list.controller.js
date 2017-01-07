function NodeJsListController(){
    var vm = this;
    vm.commits = [];

}

angular.module('gitlogs').controller('NodeJsListController', NodeJsListController);