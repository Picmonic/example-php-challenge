
<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular do nodejs/node recent commit history display</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .commit    { padding-bottom:20px; }
        .mew    { bgcolor: "#E6F1F6" }
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
<!--<body class="container" ng-app="commitApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">-->

<body ng-app="commitApp" ng-controller="mainController" class="container">




<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" ng-click="reloadPage()">Update latest 25 commits</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a ng-click="reloadPage()">Update page</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/nodejs.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Nodejs github commit</h1>
                    <hr class="small">
                    <span class="subheading">A bootstrap blog page to monitor nodejs/node recent commits</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <!-- LOADING ICON =============================================== -->
            <!-- show loading icon if the loading variable is set to true -->
            <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

            <!-- THE COMMITS =============================================== -->
            <!-- hide these commits if the loading variable is true -->

<!--            <div class="post-preview">-->
                <div class="commit" ng-hide="loading" ng-repeat="commit in commits">

                    <div class="post-preview">
<!--                        <a href="post.html">-->
                            <h2 class="post-title">
                                {{ commit.author }}
                            </h2>
                            <h3 class="post-subtitle" ng-style="set_hash_color(commit.hash)">
                                SHA: {{ commit.hash }}
                            </h3>
<!--                        </a>-->
                        <p class="post-meta">Posted on {{ commit.date }}</p>
                        <p>{{ commit.msg }}</p>
                    </div>
                    <hr>
                </div>

<!--            </div>-->
            <hr>




        </div>
    </div>
</div>

<hr>

<!-- Footer -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.min.js"></script>

</body>
</html>