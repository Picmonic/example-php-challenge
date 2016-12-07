#Install Directions

+ Follow Guidelines for installing [Homestead](http://laravel.com/docs/5.1/homestead) for your environment
+ Edit your homestead.yaml `homestead edit ` file to create a new site
```
folders:
    - map: ~/Code
      to: /home/vagrant/Code


sites:
    - map: homestead.app
      to: /home/vagrant/Code/Laravel/public
    - map: picmonic.app
      to: /home/vagrant/Code/picmonic/source/public
```
+ update `/etc/hosts` to add The picmonic.app
```
192.168.10.10 homestead.app
192.168.10.10 picmonic.app
```

+ Assuming you mapped your homestead `/home/vargrant/Code` directory to `~/Code`

```
cd ~/Code
git clone https://github.com/carl-parrish/example-php-challenge.git picmonic
```

+ copy `.env.example` to `.env` add your GitHub API credentials Here
+ run `composer install`
+ run `php artisan`
192.168.10.10 picmonic.app

run `crontab -e` and add the following cronjob
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
