# NodeJS Commit History

## Setup Instructions

### Installation
- clone repository
- `cd example-php-challenge\source`
- `composer install`
- `bower install`

### Database
- open the .env file and set credentials for preffered store method
*Default database type is MySQL to configure another type edit the default in /source/config/database.php

### Migration
- from the source directory run `php artisan migrate`

### Serve
- point your web server to the '/source/public' directory
- Alternatively you can run a local instance using `php artisan serve`


