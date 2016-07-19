<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Commits</title>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        @section('assets')
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="/css/styles.css">
        @show
      </head>
    <body> 
           @yield('content')

           @section('scripts')
           <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
           @show
    </body>

</html>
