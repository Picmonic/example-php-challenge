<?php

/**
 * This is the model class for table "commit".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $sha
 * @property string $url
 * @property string $committer
 *
 * The followings are the available model relations:
 * @property committer[] $committer_id
 */
class Commit extends Model {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'commit';
	}
	
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sha', 'unique'),
			array('url, committer', 'safe'),
		);
	}
	
	public function relations() {
		return array(
			//'files'    => array(self::HAS_MANY, 'CommitFile', 'star'),
		);
	}
	
	public function attributeLabels() {
		return array(
			
		);
	}
}
