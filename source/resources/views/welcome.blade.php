<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-tdeme.min.css" type="text/css" />
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

  <style type="text/css">
  html, body {
    height: 100%;
  }

  body {
    margin: 0;
    padding: 0;
    widtd: 100%;
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
        <a href="https://gitdub.com/joyent/node">joyent/node</a>
      </h1>

      <table class="table">
        <tr class="row bg-primary">

            <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Number</td>
            <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Title</td>
            <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">User</td>
            <td >SHA</td>
            <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">Updated At</td>

        </tr>

        @foreach($commits as $commit)
        @if (is_numeric(substr($commit["sha"],-1)))
          <tr class="row" style="background-color: #E6F1F6;">
        @else
          <tr class="row">
        @endif
          <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{$commit['url']}}">{{ $commit["number"]}}</a>
          </td>
          <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            {{$commit["title"]}}
          </td>
          <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            {{$commit["userName"]}}
          </td>

            <td>
            {{$commit["sha"]}}
          </td>
          <td class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            {{$commit["updated_at"] }}
          </td>
        </tr>
        @endforeach
      </table>

    </div>
  </div>
</body>
</html>
