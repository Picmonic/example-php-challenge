$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 300, // Transition in duration
            out_duration: 200, // Transition out duration
            ready: function() {  }, // Callback for Modal open
            complete: function() {  } // Callback for Modal close
        }
    );
});

(function() {
    var app = angular.module('store', [ ]);

    app.controller('StoreController', function(){
        this.products = gems;
    });

    var gems = [
        {
            name: 'Shows you what matters.',
            description: 'We can turn things blue, together. If your commit ends in an integer, do we have a tool for you. Simply be Joyent, and then check here daily to see if your Node repo commit turned blue. We bet it did :)',
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


////



