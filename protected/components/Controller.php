<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	
	public $layout='//layouts/main';
	public $menu=array();
	public $breadcrumbs=array();
	
	public $pageDesc = '';
	public $pageIcon = '';
	
	public $keywords = '';
	
	public function filters() {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules() {
		return array(
			/*array('allow',  // allow logged in users to view profile
				'actions'=>array('profile'),
				'users'=>array('@'),
				//'expression'=>'Yii::app()->user->role==5 || Yii::app()->user->role==4' // || Yii::app()->user->role==1
			),
			array('allow',  // allow logged in users to upload avatar
				'actions'=>array('upload'),
				'users'=>array('@'),
				//'expression'=>'Yii::app()->user->role==5 || Yii::app()->user->role==4' // || Yii::app()->user->role==1
			),*/
			array('deny',  // already logged in
				'actions'=>array('login'),
				'users'=>array('@'),
				'expression'=>'!$user->isGuest',
				'deniedCallback'=>array($this, 'alreadyLoggedIn'),
			),
			array('deny',  // already registered
				'actions'=>array('register'),
				'users'=>array('@'),
				'expression'=>'!$user->isGuest',
				'deniedCallback'=>array($this, 'alreadyRegistered'),
			),
			/*array('deny',  // deny guests to view profile
				'actions'=>array('profile'),
				'users'=>array('*'),
			),*/
			array('allow',  // allow all users
				'users'=>array('*'),
			),
		);
	}
	
	public function alreadyLoggedIn() {
		throw new CHttpException(409,'You are already logged in.');
	}
	public function alreadyRegistered() {
		throw new CHttpException(409,'You are already registered.');
	}
	
}