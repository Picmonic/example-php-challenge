<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" type="text/css" />
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

  <style>
  html, body {
    height: 100%;
  }

  body {
    margin: 0;
    padding: 0;
    width: 100%;
    display: table;
    font-weight: 100;
    font-family: 'Lato';
  }

  .container {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
  }

  .content {
    text-align: center;
    display: inline-block;
  }

  .title {
    font-size: 96px;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <div class="title">GitHub Listing</div>
      <h1 align=center>
        <a href="https://github.com/joyent/node">joyent/node</a>
      </h1>
      <table class="table">
      <div class="row bg-primary">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Number</div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Title</div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Body</div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Created_at</div>
      </div>

      @foreach($issues as $issue)
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          {{ $issue["number"]}}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          {{$issue["title"]}}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          {{$issue["body"]}}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          {{$issue["created_at"] }}
        </div>
      </div>
      @endforeach
    </table>

    </div>
  </div>
</body>
</html>
