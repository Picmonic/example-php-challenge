example-php-challenge
=====================

By, [Chris Kankiewicz](https://www.chriskankiewicz.com)


## Installation

  1. Clone this repository: `git clone https://github.com/PHLAK/example-php-challenge.git`
  2. Switch to project directory: `cd example-php-challenge/source`
  3. Install dependencies: `composer install --no-dev`
  4. Copy config file into place: `cp .env.example .env`
  5. Set database credentials in `.env`
  6. Load database schema: `php artisan migrate`
  7. Run a local server: `php -S localhost:8080 -t public`
