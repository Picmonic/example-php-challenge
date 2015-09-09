<?php
$yii = dirname(__FILE__).'/yii-1.1.16/yii.php';
$config = dirname(__FILE__).'/protected/config/core.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

/*
$app = Yii::createWebApplication($config);
$params = Yii::app()->db->createCommand()
->select('*')
->from('params')
->queryAll();
foreach($params as $param) {
	$app->params->add($param['key'], $param['value']);
}
 
$app->run();
*/
