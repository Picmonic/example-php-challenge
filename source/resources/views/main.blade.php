<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Picmonic Challenge: NodeJS Commit Log</title>

    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/gitlogs/app/layout/layout.css" rel="stylesheet">
    <script src="/bower_components/angular/angular.min.js"></script>
    <script src="/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
    <script src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="/bower_components/moment/moment.js"></script>

    <script src="/gitlogs/app/app.module.js"></script>
    <script src="/gitlogs/app/nodejs/nodejs-list.controller.js"></script>

    <base href="/">

</head>
<body ng-app="gitlogs">
    <div ui-view="header"></div>
    <div class="main-wrapper container" ui-view="container"></div>
    <div ui-view="footer"></div>
</body>


</html>