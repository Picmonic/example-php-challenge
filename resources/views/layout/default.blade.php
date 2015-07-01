<!DOCTYPE html>
<html lang="en">
<head>
    <title>Githubbifier</title>
    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="container-fluid">
    <header> @include('layout.header') </header>
    <div class="contents"> @yield('content') </div>
    <footer> @include('layout.footer') </footer>
</div>
</body>
</html>