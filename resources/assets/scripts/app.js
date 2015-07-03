$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

(function() {
    var app = angular.module('store', [ ]);

    app.controller('StoreController', function(){
        this.products = gems;
    });

    var gems = [
        {
            name: 'Shows you what matters.',
            description: 'We can turn things blue, together. If your commit ends in an integer, Oh boy, do we have a tool for you. Simply commit to the Joyent/Node repo on github. If the commit ID ended in an integer, you can bet your britches we turned it blue.',
            canHire: true,
            price: 110
        },


        {
            name: 'Saving the world, one commit at a time..',
            description: 'Be it a pretty up, or a deep data dive. If your latest commit to joyent / node ended in an integer, you bet we turned that shit blue. Click "run" above and get jamming.',
            canHire: true,
            price: 45,
        }

    ];
})();



