function NodeJsListController(gitCommitsService){
    var vm = this;
    vm.commits = [];
    vm.orderByField = 'author.name';
    vm.reverseSort = false;
    vm.checkForNewCommits = checkForNewCommits;
    vm.getCommits = getCommits;
    vm.lastCharNumeric = lastCharNumeric;

    getCommits().then(function(commits){
        vm.commits = commits;
    });

    function checkForNewCommits() {
        return gitCommitsService.getNewCommits().then(function(commits){
            return commits;
        });
    }

    function getCommits() {
        return gitCommitsService.getCommits().then(function(commits){
            return commits;
        });
    }

    function lastChar(string) {
        return string.substr(string.length - 1);
    }

    function lastCharNumeric(string){
        var char = lastChar(string);
        return !isNaN(parseFloat(char)) && isFinite(char);
    }
}

angular.module('gitlogs').controller('NodeJsListController', NodeJsListController);