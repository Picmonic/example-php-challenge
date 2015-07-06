
//controls the hamster modal
$(document).ready(function(){

    $('.modal-trigger').leanModal();
    $(".button-collapse").sideNav({
        menuWidth: 300,
        closeOnClick: true
    });
});

(function() {
    var app = angular.module('githubbifier', [ ]);

    app.controller('GithubbifierController', function(){
        this.features = gems;
    });

    var gems = [
        {
            name: 'Save a Hamster',
            description: 'You can save the life of a hamster today by simply sending us money. We will personally adopt a hamster, take care of it for a year for one low, low price.',
            canBuy: true,
            price: 1250,
            color: 'blue'
        },
    ];
})();