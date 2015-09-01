## PHP Programming Task - Damon Martineau

Forked from [Picmonic/example-php-challenge](https://github.com/Picmonic/example-php-challenge)

### Required Environment

- PHP >= 5.4
- Mcrypt PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- MySQL >= 5.0
- Composer

### Installation Instructions

- Clone repository
- Create database, eg. "laravel"
- Modify .env file following this example:

  APP_KEY=99AD9gq0NQ1zEWXSGTpH64ncdIPgA2Ln (your unique key)
  
  DB_HOST=localhost
  DB_DATABASE=laravel
  DB_USERNAME=username
  DB_PASSWORD=password

- Run "php artisan migrate" to set up database model
- Visit site, eg. http://www.example.com/laravel/public/recent
