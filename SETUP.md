1. Clone repository.
2. CD into directory and run composer install.
3. Open .env.example and save it as .env.
4. In .env file configure your database and github credentials.
5. Run php artisan migrate to create and execute migrations.
6. Run php artisan key:generate.
7. Run php -S localhost:8080 -t public.
8. Access your application at http://localhost:8080.
