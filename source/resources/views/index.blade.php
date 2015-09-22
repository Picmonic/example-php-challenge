<!DOCTYPE html>
<html ng-app="Picmonic">
    <head>
        <script>
            commits = {!! $commits !!};
        </script>
        <script src="/js/app.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/app.min.css" />
        <title>Picmonic Sample PHP Test</title>
        <base href="/" />
    </head>
    <body>
        <div ng-view class="container-fluid"></div>
    </body>
</html>
