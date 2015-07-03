<!DOCTYPE html>
<html lang="en" ng-app="store">
<head>
    <title>Githubbifier</title>
    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body ng-controller="StoreController as store">
<script type="text/javascript" src="{{ URL::asset('js/all.js') }}"></script>
<div class="container-fluid">
    <header> @include('layout.header') </header>
    <div class="contents"> @yield('content') </div>
    <footer> @include('layout.footer') </footer>
</div>
</body>
</html>