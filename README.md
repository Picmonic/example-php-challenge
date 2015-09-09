# PicMonic Commits App by Scott Geithman

Took me a minute because I use bitbucket and have never used the api or the interface from github ...

This app requires you to be logged in to add the commits to the database and to view the commits. If you click the "Get Commits" button without being signed in, you will be redirected to the login page.
```bash
username: picmonic
password: picmonic
```

## Setup

1. Clone the repository into your document root (the Yii framework is already included)
2. Create a new MySQL database and database user
3. Import **protected/data/install.sql** into your new blank database
4. Edit **protected/config/core.php** (add your newly created database settings to the code block shown below)

## Change Database Config Settings

If your server is localhost edit the first set otherwise change the curly bracket information
```php
'db'=>array(
    'connectionString' => 'mysql:host=localhost;'.($_SERVER['SERVER_NAME'] == 'localhost' ? 'dbname=picmonic' : 'dbname={your_database_name}'),
    'emulatePrepare' => true,
    'username' => ($_SERVER['SERVER_NAME'] == 'localhost' ? 'root' : '{your_database_user}'),
    'password' => ($_SERVER['SERVER_NAME'] == 'localhost' ? '' : '{your_database_password}'),
    'charset' => 'utf8',
    'tablePrefix' => '',
),
```

## Run It From The Root
