@extends('layout.default')
@section('content')
    <div ng-repeat="feature in githubbifier.features" class="#e3f2fd blue lighten-5">
        <h1> Promo of the day: @{{feature.name}} </h1>
       <p> @{{feature.description}}</p>
    </div>
    <hr>
    <div class="white">
        <h3>Currently Storing: </h3>
        @if (count($dbDump ) > 1)
            {{ count($dbDump) }} commits!

            @for ($i = 0; $i < 5; $i++)
                {{ $dbDump[$i]->committer_name }}
            @endfor

        @else
            No records to show yet, click <a href="{{URL::to('/run')}}">run!</a>
        @endif
    </div>

    <div id="readme" class="blob instapaper_body white">
        <article class="markdown-body entry-content" itemprop="mainContentOfPage"><h1><a id="user-content-githubifier" class="anchor" href="#githubifier" aria-hidden="true"><span class="octicon octicon-link"></span></a>Githubifier</h1>

            <p>Githubifier is a quick and basic Laravel 5 Application that connects to github and returns the joyent/node recent commits</p>

            <ul>
                <li>Connects to the Github API</li>
                <li>Finds the joyent/node repository</li>
                <li>Finds the 25 most recent commits</li>
                <li>Creates a model and stores the 25 most recent commits in the database. Make sure to avoid any duplicates.</li>
                <li>Creates a basic template and utilize a CSS framework (Bootstrap, Pure, etc.)</li>
                <li>Creates a route and view which displays the recent commits by author from the database.</li>
                <li>If the commit hash ends in a number, colors that row light blue (#E6F1F6).</li>
                <li>Uses Laravel Elixer to mix and serve assets</li>
                <li>Uses Bootstrap to pretty up</li>
            </ul>

            <h3><a id="user-content-version" class="anchor" href="#version" aria-hidden="true"><span class="octicon octicon-link"></span></a>Version</h3>

            <p>0.0.2</p>

            <h3><a id="user-content-installation" class="anchor" href="#installation" aria-hidden="true"><span class="octicon octicon-link"></span></a>Installation</h3>

            <div class="highlight highlight-sh"><pre>$ git clone https://github.com/ecommerce-technician/example-php-challenge/tree/picmonic <span class="pl-c1">source</span>
$ <span class="pl-c1">cd</span> <span class="pl-c1">source</span>
$ composer install
$ npm install
$ bower install
$ gulp
$ php artisan migrate</pre></div>

            <h3><a id="user-content-plugins" class="anchor" href="#plugins" aria-hidden="true"><span class="octicon octicon-link"></span></a>Plugins</h3>

            <p>Githubifier is currently extended with the following plugins</p>

            <ul>
                <li>KnpLabs Github</li>
            </ul>

            <h3><a id="user-content-notes" class="anchor" href="#notes" aria-hidden="true"><span class="octicon octicon-link"></span></a>NOTES</h3>

            <p>If hitting '[PDOException] SQLSTATE[HY000] [2002] No such file or directory error when migrating' error</p>

            <ul>
                <li>locate your 'unix_socket' setting in config/database.php</li>
                <li>run:</li>
            </ul>

            <div class="highlight highlight-sh"><pre>vagrant ssh
mysql --host=localhost --user=homestead --password=secret homestead
mysql<span class="pl-k">&gt;</span> show variables like <span class="pl-s"><span class="pl-pds">'</span>%sock%’;</span></pre></div>

            <p>And then change 'unix socket' in config/database.php to the result found above</p>
        </article>
    </div>

@stop