<!DOCTYPE HTML>
<html>
	<head>
		<title>@section('page-title') Example PHP Challenge @show</title>
		@section('page-styles')
		<link rel="stylesheet" href="/css/app.css" />
		@show
	</head>
	<body>
		@section('body')<div id="app"></div>@show
		@section('page-scripts')
		<script type="text/javascript" src="/js/app.js"></script>
		@show
	</body>
</html>