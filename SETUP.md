# Project Setup
Provisioning of the project uses Vagrant + VirtualBox to provision a guest VM environment.

  1. clone this project
  1. cd to the project directory
  2. run the following command `vagrant up`
  3. visit `https://machine1.puphpet/` in your browser

Installation of composer dependencies, as well as database initialization is handled during initial provisioning.

## Maybe it will work on your machine
If you've got the following on your local machine, you may be able to run the example without upping vagrant. Try at your own risk.

### Requirements
  
  * PHP >=5.7 w/ curl, pdo/sqlite, extensions
  * Composer

### Steps

  1. clone this project
  2. cd to the project directory
  3. Run the following commands `cd source/`, `composer install`, `vendor/bin/doctrine-migrations migrations:migrate`. Follow prompts where necessary.
  4. Start PHP's built in server `php -S 0.0.0.0:8080 -t public/`
  5. Access the site in your browser `localhost:8080/`.
  
