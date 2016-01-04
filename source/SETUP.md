##PHP Programming Task Set Up Overview

This project uses Vagrant to accomplish the requirements of the programming task (see the README.md).
It will create an Ubuntu-based web server using the ScotchBox flavor of Homestead, which simplifies provisioning.
Vagrant will require the vagrant-hostmanager plugin (https://github.com/smdahlen/vagrant-hostmanager).

I've included the Laravel implementation of PHP Debugbar to allow front-end code examination. 

##Set up Instructions

1. Clone my repository.
2. Navigate to the "Source" folder and type "vagrant up --provision". (ScotchBox sometimes will finish box creation without provisioning.  You may also have to use "vagrant reload --provision".)
3. SSH into the new Vagrant box ("vagrant ssh").
4.  cd /var/www and type "composer install" (or "composer update" though install is probably faster.)
5. Setup the environment variables: type "cp .env.example .env"

##Running the application

1. Run the migrations to create the application tables ("php artisan migrate")
2. Open your browser and navigate to http://picmonic.dev
3. No data has yet been loaded. Click the red button to load data.  

And that's it.  There may be some Ruby/Bower issues on this flavor of ScotchBox, but that only interferes with using Gulp or other transpiled features, 
but those can be fixed inside the Vagrant install.  They should not, however, interfere with testing the actual application functions.  