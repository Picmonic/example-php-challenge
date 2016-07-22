## Setup

1. Browse to **./source**
2. Run `composer install`
3. Copy `.env.example` and edit as necessary
4. Generate application key via `php artisan key:generate`
5. Perform database migrations via `php artisan migrate`
6. Edit `config/github.php` with your GitHub personal access token
7. Serve through `php artisan serve` or any modern HTTP server
