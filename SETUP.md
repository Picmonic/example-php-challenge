Requirments:
* Composer
* PHP 5.2+
* MySql
* Apache

Installation instructions

* Webserver:
1) Point webserver to source/picmonic-demo/web/ with alias of [localhost/]picmonic_demo

* Database creation:
1) Update the DB credentials in source/app/parameters.yml
- database_name does not need to exist, symfony (doctrine) will create this
2) Navigate to source/picmonic-demo/
3) Run: php app/console doctrine:database:create --force
4) Update newly created database with tables
- Run: php app/console doctrine:schema:update --force

* Run Composer to fetch/update dependencies
1) From the source/picmonic-demo/ directory, run composer update


