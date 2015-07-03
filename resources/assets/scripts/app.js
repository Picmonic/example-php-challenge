(function() {
    var app = angular.module('store', [ ]);

    app.controller('StoreController', function(){
        this.products = gems;
    });

    var gems = [
        {
            name: 'Ecommerce and Marketing',
            description: 'Google Partner, Google Search Marketing, Google Display Advertising Expert Certifications, Direct Marketing Association Ecommerce Certification, Google Engage Allstar Competitor, Facebook App Developer, Bing Ads API, Google Analytics API, Recorded Future, RSS Feed Injection, Semantic SEO and Rich Snippets, Spree Commerce, and more',
            canHire: true,
            price: 110
        },


        {
            name: 'General Web Development',
            description: 'Javascript, HTML5, CSS3, PHP, Ruby on Rails, Coldfusion',
            canHire: true,
            price: 45,
        }

    ];
})();


////



