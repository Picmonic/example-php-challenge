<!DOCTYPE html>
<html lang="en" ng-app="githubbifier">
<head>
    <title>Githubbifier</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body ng-controller="GithubbifierController as githubbifier">
    <script type="text/javascript" src="{{ URL::asset('js/all.js') }}"></script>
    <header>
        @include('layout.header')
    </header>
    <main>
    <div class="container">
    <div class="contents">
        @yield('content')
    </div>
    </main>

    <footer>
        @include('layout.footer')
    </footer>
</div>
</body>
</html>