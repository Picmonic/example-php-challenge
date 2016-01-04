Prerequisites
	•	Have working database and connection. If you are using mysql you can create the table structure needed and user/permissions by executing the queries listed in Step A1.
	•	Clone this repo (master branch)

Setup environment & project database
	1	Setup composer:
	◦	php -r "readfile('https://getcomposer.org/installer');" | php
	2	Setup laravel
	◦	composer global require "laravel/installer=~1.1"
	3	cd into the repo root directory, then cd into the "commits" folder
	4	Make sure Laravel is installed in current project
	◦	php composer.phar install 
	5	Adjust your database settings in app/database.php to match your local database setup or the provided credentials as listed in Step 1A. Also setup environment variables "cp env.example .env" and then update .env
	6	Create the project database via:
	◦	(choose your method depends on which db system you are using. Just make sure to create a table named "commits")
	◦	create the necessary tables:
	⁃	php artisan make:migration create_commits_table --create=commits
	7	Edit db migration (in database/[date]_create_commits_table.php) to contain the following column definitions in the public function up section, if not already present:
	◦	    public function up()
    {
        Schema::create('commits', function (Blueprint $table) {
            $table->increments('id');

            $table->string('author');
            $table->string('hash');
            // should probably be unqique key like: $table->string('hash')->unique();
            $table->string('date');
            $table->text('msg');

            $table->timestamps();
        });
    }

	8	Run migrations:
	◦	php artisan migrate
	9	start local webserver to review this repo at "localhost:8000/"
	◦	php artisan serve
	10	If you experience any errors please check to makes sure your db setup is intact and perhaps:
	◦	composer update
	11	Have a beer, enjoy!
	12	If you have questions or comments feel free to reach out to me at: benjamin.largent@gmail.com


Step 1A: setting up mysql project user and permissions
	1	CREATE USER 'pictest'@'localhost' IDENTIFIED BY 'pictest';
	2	GRANT SELECT,INSERT,UPDATE,DELETE,ALTER,CREATE,DROP ON `commits`.* TO 'pictest'@'localhost';
	3	FLUSH PRIVILEGES;