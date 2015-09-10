<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <title>Testing App</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
{{ HTML::style('css/normalize.css'); }} 
{{ HTML::style('css/foundation.css'); }}  

{{ HTML::script('js/vendor/modernizr.js'); }}
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
</head>


<body>

  <header>
@section('header') 
  <div class="row">
  <div class="xlarge-12 columns">
  <img src="http://www.picmonic.com/wp-content/themes/ids-picmonic/images/PicmonicLogo.png">
  </div>
  </div>
@show
</header>


  <section class="middle">
@yield('content')

  </section>
  

  <footer>
  	<div class="row">
  	<div class="large-12 columns">
  	 <font size="-2">Footer</font>
  	</div></div>
  </footer>

{{ HTML::script('js/vendor/jquery.js'); }}  
{{ HTML::script('js/foundation.min.js'); }}


  <script>
    $(document).foundation();
  </script>
</body>
</html>