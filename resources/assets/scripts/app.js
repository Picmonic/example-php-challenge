(function() {
    var app = angular.module('store', [ ]);

    app.controller('StoreController', function(){
        this.products = gems;
    });

    var gems = [
        {
            name: 'Alex',
            description: 'Data driven builder of worlds, ecommerce and finance technologist personal consult',
            canHire: true,
            price: 225,
        },

        {
            name: 'Data Visualization and Dashboard Builds',
            description: 'Data cruncher, API wrecker, chart builds, crawlers, data analytics, forecasting, competitive intelligence and more',
            canHire: true,
            price: 75,
        },


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

