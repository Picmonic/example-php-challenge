<!doctype html>
<html lang="en">
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">                
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>