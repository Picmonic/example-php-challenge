# Example PHP Challenge

## Setup Instructions
1. Browse to the "source" directory.
2. Install required assets `sudo npm install -g gulp-cli && composer install && npm install`
3. Copy the .env.example file to .env and modify the configuration as needed.
4. Generate an application key by running `php artisan key:generate` in the source directory.
5. Run database migrations and seeds `php artisan migrate:refresh && php artisan db:seed`.
5. Compile assets `gulp build`
6. Serve and access the application using `php artisan serve` or a modern HTTP server.
7. Profit.