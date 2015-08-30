<!DOCTYPE html>
<html>
    <head>
        <title>Recent Commits to /joyent/node</title>

		  <!-- add in Bootstrap support -->
		  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

        <!-- TO DO: move to ext style sheets -->
		  <style>
            #recent_page { margin: 10px 0; }
            #recent_page div { }
				.com_header { background: #BBBBBB; }
				.com_row:nth-child(even) { background: #DDDDDD; }
				.com_row:nth-child(odd) { background: #EEEEEE; }
            .com_name { }
            .com_email { }
            .com_date { }
            .com_message { }
            .com_url { }
            .com_sha { }
				.hash_ends_with_number { background: #E6F1F6; }
		  </style>
    </head>
    <body>
<div class="container">
<div class="row centered-form" id="recent_page">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">Recent Commits to <a href="https://github.com/joyent/node/commits/master" target="_blank">/joyent/node</a></h3>
      </div>
      <div class="panel-body">

			<div class="col-xs-12 com_header">
				<div class="col-xs-2">User</div>
				<div class="col-xs-2">Email</div>
				<div class="col-xs-2">Date</div>
				<div class="col-xs-5">Message</div>
				<div class="col-xs-1">Hash</div>
			</div>
			 @if (count($recent_commits))
				  @foreach($recent_commits as $recent_commit)
						@include('commit', $recent_commit)
				  @endforeach
			 @else
				  <p>No recent commits found, these guys need to get busy!</p>
			 @endif
			 <input type="submit" value="Login" class="btn btn-info">
      </div>
    </div>
  </div>
</div>
</div>

    </body>
</html>
