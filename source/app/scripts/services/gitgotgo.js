

'use strict';


angular.module('picmonicApp').service('gitgetgo', function ($http) {


    function gitGet(callback) {
        var options = {
            baseURL: 'https://api.github.com/repos',
            user: 'nodejs',
            repo: 'node'
        };


        function groupByAuthor(arr) {
            var tempStore = [];
            var tempStoreLen;

            var arrlen = arr.length;

            outerLoop:
            for(var i = 0 ; i < arrlen; ++ i ) {
                tempStoreLen = tempStore.length;
                for(var j = 0 ; j < tempStoreLen; ++ j ) {
                    if (arr[i].author.login == tempStore[j].name ) {
                        tempStore[j].data.push(arr[i]);
                        continue outerLoop;
                    }
                }
                tempStore.push({name : arr[i].author.login, data : [arr[i]]  });
            }
            return tempStore;
        }



        $http({
            method: 'GET',
            url: options.baseURL+'/'+options.user+'/'+options.repo+'/commits'
        }).then(function (response) {

            callback(groupByAuthor(response.data.splice(0,25))) ;


        }, function (response) {
            throw new Error('ZOMG error! - git get fail - '+ response) ;
        });


    }


    return {
        gitGet:gitGet

    };
});

