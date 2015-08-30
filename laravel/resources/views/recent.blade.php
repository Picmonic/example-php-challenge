<!DOCTYPE html>
<html>
    <head>
        <title>Recent Commits to /joyent/node</title>
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
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 48px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Recent Commits to <a href="https://github.com/joyent/node/commits/master" target="_blank">/joyent/node</a></div>

                @if (count($recent_commits))
                    @foreach($recent_commits as $recent_commit)
                        @include('commit', $recent_commit)
                    @endforeach
                @else
                    <p>No recent commits found, these guys need to get busy!</p>
                @endif

            </div>
        </div>
    </body>
</html>
