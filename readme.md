# Githubifier

Githubifier is a quick Laravel 5 Application that connects to github and returns the 25 most recent joyent/node commits

 - Connects to the Github API using knplabs/github library
 - Uses Laravel blade templates to interact with data via controller
 - Finds the joyent/node repository
 - Pulls in daily recent commits
 - Creates a model, stores and retrieves top 25 commits from the database.
 - Error checks for duplicates before inputting into db.
 - Creates routes and views which displays the recent commits by author from the database.
 - If the commit hash ends in a number, shows that row light blue (#E6F1F6).
 - Uses Laravel Elixer to mix and serve assets

 BONUS STUFF HIT
 - Assets compiled with gulp
 - sass and js mixed using Elixer
 - Uses Angular
 - Uses Bower
 - Uses Node
 - Uses Composer
 - Utilizes Vagrant Box / Homestead
 - Uses Materialize CSS and some fonts
 - Includes demonstration of responsive design
 - Includes responsive menu and swipe menu on mobile
 - Uses angular to display recent alerts
 - Aggregates commits to count total number in database



### Version
0.0.2

###Installation
```sh
$ git clone https://github.com/ecommerce-technician/example-php-challenge/tree/picmonic source
$ cd source
$ composer install
$ npm install
$ bower install
$ gulp
$ php artisan migrate
```

### Plugins

Githubifier is currently extended with the following plugins

* KnpLabs Github

###NOTES

####If hitting '[PDOException] SQLSTATE[HY000] [2002] No such file or directory error when migrating' error
* locate your 'unix_socket' setting in config/database.php
* run:
```sh
vagrant ssh
mysql --host=localhost --user=homestead --password=secret homestead
mysql> show variables like '%sock%’;
```

And then change 'unix socket' in config/database.php to the result found above

####Dont forget to set your .env variables, check out .env.example, simply delete the .example
