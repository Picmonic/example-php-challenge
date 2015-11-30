<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Github Challenge</title>

    <!-- csss libraries -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    
    <!-- js libraries -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <!-- custom js and css -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: 'Raleway';
            padding-top: 70px;
        }

        button .fa {
            margin-right: 6px;
        }

        .table-text div {
            padding-top: 6px;
        }
    </style>

</head>

<body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="/">Picmonic Challenge</a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="/showauthors">Show Authors</a></li>
                            <li><a href="/admin">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    @yield('content')

</body>
</html>
