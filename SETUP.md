# NodeJS Commit History

## Setup Instructions

### Installation
- clone repository
- `cd example-php-challenge\source`
- `composer install`
- `bower install`
- copy or rename the .env.example file to .env in the /source diretory
- from the source directroy run `php artisan key:generate`

### Database
- set credentials in .env file for preffered store method
*Default database type is MySQL to configure another type edit the default in /source/config/database.php

### Migration
- from the source directory run `php artisan migrate`

### Serve
- point your web server to the '/source/public' directory
- Alternatively you can run a local instance using `php artisan serve`


