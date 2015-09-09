<?php
class UserIdentity extends CUserIdentity {
	private $_id;
			
	public function authenticate($force=false) {
		
		//$record=User::model()->findByAttributes(array('email'=>$this->username));
		
		if(strpos($this->username,"@")) {
			$record = User::model()->findByAttributes(array('email'=>$this->username));
		}
		else {
			$record = User::model()->findByAttributes(array('username'=>$this->username));
		}
		
		if($record === null) {
		    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		}
		else if($record->password !== User::model()->encryptHash($this->password, Yii::app()->params['encryptionKey'])) {
		    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		}
		else if($record->status == 3 || $record->status == 0) {
			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		}
		else {
			$force = true;
		}
		
		if ($force && $record != NULL) {
			$this->_id = $record->id;
			$this->setState('username', $record->username);
			$this->setState('email', $record->email);
			$this->setState('image', $record->image);
			$this->setState('status', $record->status);
		  	$this->setState('role', $record->user_role);
		  	$this->setState('role_name', $record->role->name);
			$this->setState('display_name', $record->display_name);
			$this->setState('profile', $record->profile);
		    $this->errorCode=self::ERROR_NONE;
		}
		
		return !$this->errorCode;
    }

		
	public function getId() {
    	return $this->_id;
	}
}
