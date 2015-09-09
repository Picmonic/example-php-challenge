<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $image
 * @property integer $user_role
 * @property integer $status
 * @property string $create_time
 * @property integer $create_by
 * @property string $update_time
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Content[] $contents
 * @property Tags[] $tags
 * @property UserMetadata[] $userMetadatas
 * @property UserRoles $userRole
 */
class User extends Model {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'user';
	}
	
	public function primaryKey() {
		return array('id');
	}
	
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, user_role, status', 'required'),
			//array('type','checkType'),
			array('user_role, status', 'numerical', 'integerOnly'=>true),
			array(
				'display_name',
				'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_ -]/',
				'message' => 'Invalid characters, Display Name may only contain letters, numbers, dashes, underscores, and spaces.',
			),
			array(
				'username',
				'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
				'message' => 'Invalid characters, Username may only contain letters, numbers, dashes, and underscores and must not contain any spaces.',
			),
			array('password', 'length', 'max'=>64),
			array('password', 'length', 'min'=>6),
			array('username', 'length', 'min'=>4),
			array('username', 'length', 'max'=>20),
			array('username', 'unique', 'message'=>'Username already exists!'),
			array('email', 'length', 'max'=>255),
			array('email', 'email'),
			array('email', 'unique', 'message'=>'Email already exists!'),
			array('profile, image', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, user_role, status, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}
	/*public function checkType($attributes,$params) {
		if($this->type == 1) {
			if(empty($this->name_first)) {
				$this->addError('first_name','You must enter a First Name');
			}
			if(empty($this->name_last)) {
				$this->addError('last_name','You must enter a Last Name');
			}
		}
		elseif($this->type == 2) {
			if(empty($this->name)) {
				$this->addError('name','You must enter a Name');
			}
		}
	}*/
	
	public function relations() {
		return array(
			'metadata'    => array(self::HAS_MANY, 'UserMetadata', 'user_id'),
			'role'        => array(self::BELONGS_TO, 'UserRoles', 'user_role'),
			'profile'     => array(self::HAS_ONE, 'UserProfile', 'user_id'),
			'creator'     => array(self::BELONGS_TO, 'User', 'create_by'),
			'updater'     => array(self::BELONGS_TO, 'User', 'update_by'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'id'               => 'ID',
			'password'         => 'Password',
			'email'            => 'Email',
			'user_role'        => 'Role',
			'status'           => 'Status',
			//'create_time'      => 'Created',
			//'update_time'      => 'Updated',
			//'create_by'        => 'Creator',
			//'update_by'        => 'Updater',
		);
	}
	
	public function getUrl() {
		//if(Yii::app()->user->isGuest) {
			//return 'javascript:void(0);';
		//}
		//else {
			return Yii::app()->createUrl('user/profile', array(
				'id'=>$this->id,
				//'title'=>$this->title,
			));
		//}
	}
	
	public function getLocation() {
		$loc = array();
		if(isset($this->profile->address) && !empty($this->profile->address)) $loc[] = $this->profile->address;
		if(isset($this->profile->address2) && !empty($this->profile->address2)) $loc[] = $this->profile->address2;
		if(isset($this->profile->city) && !empty($this->profile->city)) $loc[] = $this->profile->city;
		if(isset($this->profile->state) && !empty($this->profile->state)) $loc[] = $this->profile->state;
		if(isset($this->profile->zipcode) && !empty($this->profile->zipcode)) $loc[] = $this->profile->zipcode;
		if(isset($this->profile->country) && !empty($this->profile->country)) $loc[] = $this->profile->country;
		if(count($loc) > 0) {
			return implode(", ", $loc);
		}
		else {
			return 'N/A';
		}
		//$loc[]
	}
	
	public function recentUsers($limit=10) {
		return $this->findAll(array(
			'condition'=>'t.status=1',
			'order'=>'t.create_time DESC',
			'limit'=>$limit,
		));
	}
	
	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('user_role',$this->user_role);
		$criteria->compare('status',$this->status);
		//$criteria->compare('create_time',$this->create_time,true);
		//$criteria->compare('update_time',$this->update_time,true);
		//$criteria->compare('create_by',$this->create_by,true);
		//$criteria->compare('update_by',$this->update_by,true);
		$criteria->order = "id DESC";
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() {
	    if ($this->isNewRecord) {
			$this->create_time = new CDbExpression('NOW()');
			if(Yii::app()->user->id > 0) {
				$this->create_by = Yii::app()->user->id;
			}
			else {
				$this->create_by = 0;
			}
			//$this->status = 1;
		}
	   	else {
			$this->update_time = new CDbExpression('NOW()');
			$this->update_by = Yii::app()->user->id;
		}
		return parent::beforeSave();
	}
	
	/*
	public function afterSave() {
	    if ($this->isNewRecord) {
			$user_profile = new UserProfile;
			$user_profile->user_id = $this->id;
			$user_profile->save();
		}
	   	else {
	    	
		}
		return parent::afterSave();
	}
	*/
	
	public function encryptHash($password, $_dbsalt) {
		return mb_strimwidth(hash("sha512", hash("sha512", hash("whirlpool", md5($password))) . hash("sha512", md5($password . md5($_dbsalt))) . $_dbsalt), 0, 64);
	}
}
