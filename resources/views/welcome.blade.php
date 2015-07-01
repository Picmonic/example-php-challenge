<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Githubbifier</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
            <div class="container-fluid">
                <div class="row">
                    <nav class="navbar navbar-default" role="navigation">
                        <div>
                            <ul class="nav navbar-nav">
                                <li class="active navbar-header">
                                    <a href="#">Alex Wood</a>
                                </li>
                                <li>
                                    <a href="#">Githubifier</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>
                                Githubbifier! <small>A thing that goes through joyent and makes stuff blue.</small>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        MYSQL DUMP GOES HERE {!! $dump !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="githubResults">{!! $content !!}</div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}"></script>
    </body>
</html>