<?php

class SiteController extends Controller {
	
	public function actionIndex() {
		$this->render('index', array(
			//
		));
	}
	
	public function actionError() {
		$this->layout = '//layouts/main';
		
		if($error = Yii::app()->errorHandler->error) {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
		else {
			$this->render('error', array(
				'code'=>'404',
				'message'=>'Unable to resolve the request.',
			));
		}
	}
	
	public function actionLogin() {
		$this->layout = '//layouts/login';
		$model = new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm'])) {
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				
				//$user_role = (User::model()->find('id=:id',array(':id'=>yii::app()->user->id))->user_role);
				//$this->redirect(Yii::app()->homeUrl);
				$this->redirect(Yii::app()->createUrl("commit"));
				
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}