<!doctype html>
<html lang="en">
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">                
    </head>
    <body ng-app="GithubApp">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#/commits">joyent/node</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#/commits">Commits</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>        
        <div class="container content">
            <ng-view></ng-view>            
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-route.min.js"></script>
        <script src="js/controllers.js"></script>                
        <script src="js/services.js"></script>                        
        <script src="js/app.js"></script>        
    </body>
</html>