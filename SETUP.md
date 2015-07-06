1. Clone repository.
2. Run composer install.
3. Open .env.example and save it as .env.
4. In .env file configure your database and github credentials.
5. Run php artisan migrate to create and execute migrations
6. php artisan key:generate
7. Access your application to following URL http://localhost/example-php-challenge-master/public/github?organization=joyent&repo=node. This will connect to github, pull data for joyent/node and populate database.
8. To view commits access following url http://localhost/example-php-challenge-master/public/commits
9. Click on login name to view commits for that user.
