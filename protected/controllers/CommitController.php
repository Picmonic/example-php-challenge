<?php

class CommitController extends Controller {
	
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function accessRules() {
		return array(
			array('allow',  // allow all logged in users
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex() {
		//commits from github
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, "https://api.github.com/repos/nodejs/node-v0.x-archive/commits?per_page=25&page=1");
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		
		$cont = curl_exec($curl);
		$commits = json_decode($cont);
		
		curl_close($curl);
		
		//echo count($commits);
		//die;
		
		//add to database
		foreach($commits as $item) {
			$commit = new Commit;
			$commit->sha = $item->sha;
			$commit->url = $item->html_url;
			$commit->committer = $item->author->login;
			$commit->save();
		}
		
		$criteria = new CDbCriteria();
		
		//$criteria->addCondition('status=1');
		
		//counts
		$count = Commit::model()->count($criteria);
		$pages = new CPagination($count);
		$pageSize = isset(Yii::app()->params['commitsPerPage']) ? Yii::app()->params['commitsPerPage'] : 25;
		$pages->pageSize = $pageSize;
		$pages->applyLimit($criteria);
		
		//sorting
		$sort = new CSort('Commit');
		$sort->defaultOrder = array(
			'committer'=>CSort::SORT_ASC,
		);
		$sort->attributes = array(
			'id' => array(
				'asc' => "id",
				'desc' => "id DESC",
			),
			'sha' => array(
				'asc' => "sha",
				'desc' => "sha DESC",
			),
			'committer' => array(
				'asc' => "committer",
				'desc' => "committer DESC",
			),
		);
		$sort->applyOrder($criteria);
		
		$items = Commit::model()->findAll($criteria);
		
		$this->render('index', array(
			'items' => $items,
			'pages' => $pages,
			'sort' => $sort,
			'commits' => $commits,
		));
	}
}
