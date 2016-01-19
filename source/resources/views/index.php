<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> 
	
	<title>Laravel Code Challenge</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <link rel="stylesheet" href="css/app.css"> <!-- load styles -->

    
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
    
    <!-- ANGULAR -->
	 <script src="js/controllers/mainController.js"></script> <!-- load our controller -->
	 <script src="js/services/commitService.js"></script> <!-- load our service -->
	 <script src="js/app.js"></script> <!-- load our application -->
    

</head> 
<!-- declare our angular app and controller --> 
<body class="container" ng-app="commitApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Last 25 Commits From nodejs/node</h2>
    </div>

	 <!-- LOADING ICON =============================================== -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
    
    <!-- COMMIT LIST =============================================== -->
    <div class="commit" ng-hide="loading" ng-repeat="commit in commits">
        <h3 class="{{ commit.hashcheck }}">{{ commit.sha }} <small>by {{ commit.user }}</h3>
        <p>{{ commit.message }}</p>
    </div>    

</body>

</html>
