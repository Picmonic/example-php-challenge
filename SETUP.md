# Githubifier

###SETUP
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
* And then change 'unix socket' in config/database.php to the result found above

####Dont forget to set your .env variables, check out .env.example, simply deleteteh .example