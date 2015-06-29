# Githubifier

Githubifier is a quick and basic Laravel 5 Application that connects to github and returns the joyent/node recent commits

 - Connects to the Github API
 - Finds the joyent/node repository
 - Finds the 25 most recent commits
 - Creates a model and stores the 25 most recent commits in the database. Make sure to avoid any duplicates.
 - Creates a basic template and utilize a CSS framework (Bootstrap, Pure, etc.)
 - Creates a route and view which displays the recent commits by author from the database.
 - If the commit hash ends in a number, colors that row light blue (#E6F1F6).
 - Uses Laravel Elixer to mix and serve assets
 - Uses Bootstrap to pretty up

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
$ php artisan serve
```

### Plugins

Githubifier is currently extended with the following plugins

* KnpLabs Github






