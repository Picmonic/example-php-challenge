
<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular do nodejs/node recent commit history display</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .commit    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/services/commitService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commitApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">
    <p>Meow</p>

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular monitor commits for nodejs/node</h2>
        <h4>nodejs commit monitoring</h4>
    </div>

    <!-- NEW COMMENT FORM =============================================== -->
    <!--    <form ng-submit="submitCommit()">-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="Name">-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-group text-right">-->
    <!--            <button type="submit" class="btn btn-primary btn-lg">Submit</button>-->
    <!--        </div>-->
    <!--    </form>-->

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE COMMITS =============================================== -->
    <!-- hide these commits if the loading variable is true -->
    <div class="commit" ng-hide="loading" ng-repeat="commit in commits">
        <h3>Commit author: {{ commit.author }} </h3>
        <p> <small>SHA: {{ commit.sha }}</small><br>
            <small>Date: {{ commit.date }}</small><br>
            {{ commit.msg }}
        </p>

        <!--        <p><a href="#" ng-click="deleteCommit(commit.id)" class="text-muted">Delete</a></p>-->
    </div>

</div>
</body>
</html>