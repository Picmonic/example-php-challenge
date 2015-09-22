## SETUP

1. Clone this reposity
2. Run the following commands:
	- cd source
	- composer install
	- php vendor/bin/homestead make
	- vagrant up
	- vagrant ssh
	- cd source
	- php artisan migrate
	- npm install --no-bin-links
	- bower install
	- gulp
3. now visit 192.168.10.10 in your favorite browser

* Note: if not using vagrant skip the two vagrant commands and copy the .env.example to .env and change database settings accordingly
