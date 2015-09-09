# PicMonic Commits App by Scott Geithman

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

### Directory Structure
```
  assets/             contains runtime generated assets (empty to begin with)
  protected/          contains components, config, controllers, data, models, and runtime
  themes/             contains all css, fonts, js, and views (all html code)
  yii-1.1.16/         contains the Yii framework
```

## Run It From The Root
