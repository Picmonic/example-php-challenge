<!DOCTYPE html>
<html ng-app='RUJL'>
<head>
    <title>Laravel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./components/bootstrap-css-only/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.commit.css">
</head>
<body>
<div class="container" ng-controller="showBrags">
    <div class="row" ng-repeat="commit in ::commits track by commit.id">
        <div class="col-md-12">
            <div class="col-md-10">
                    <img class="commitImage" src="{{ ::commit.authorImage }}" width="50" height="50">
                    <span class="colorBlack">- {{  ::commit.author }}</span> <br />

            </div>
            <div class="col-xs-10 col-xs-offset-2 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  minWidth400 boxDecorator" ng-class="{'lightBlue' : endsWith(commit.sha)}">
                <span><span class="colorBlack">Commit :</span> {{ ::commit.sha }} <span class="colorBlack">| Date : </span>{{ ::commit.created_at }}</span>
                <hr />
                <p> <span class="colorBlack">Message : </span>{{ ::commit.message }}</p>
            </div>
        </div>
    </div>

</div>
<script src="./components/angular/angular.js"></script>
<script src="./components/angular-bootstrap/ui-bootstrap.min.js"></script>

<script src="./js/app.js"></script>
<script src="./js/commits/index.commits.service.js"></script>
<script src="./js/commits/index.commits.controller.js"></script>
</body>
</html>