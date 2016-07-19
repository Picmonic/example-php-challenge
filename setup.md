# PHP Challenge Instructions

# Setup 
1. Browse to the "source" directory.
2. Copy and rename the .env.example file to .env and modify the configuration as needed (e.g. enter github_token).
3. Run `composer install` to load dependencies.
4. Install redis onto your machine and run `redis-server` in redis-cli to start redis server. Check redis.io quickstart for more help depending on Mac or Windows. 
5. Generate an application key by running `php artisan key:generate` in the source directory.
6. Run database migrations `php artisan migrate`.
7. Serve the application using `php artisan serve` and view it.
