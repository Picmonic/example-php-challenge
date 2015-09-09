<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'theme' => 'default',

	// preloading components
	'preload'=>array(
		'log',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
        	//'class' => 'SlugURLManager',
			//'cache' => true,
			'urlFormat'=>'path',
        	'showScriptName'=>false,
			'appendParams'=>false,
			'rules'=>array(
				'login' => '/site/login',
				'logout' => '/site/logout',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/page/<page:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
        ),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;'.($_SERVER['SERVER_NAME'] == 'localhost' ? 'dbname=picmonic' : 'dbname={your_database_name}'),
			'emulatePrepare' => true,
			'username' => ($_SERVER['SERVER_NAME'] == 'localhost' ? 'root' : '{your_database_user}'),
			'password' => ($_SERVER['SERVER_NAME'] == 'localhost' ? '' : '{your_database_password}'),
			'charset' => 'utf8',
			'tablePrefix' => '',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	'params'=>require(dirname(__FILE__).'/params.php'),
);