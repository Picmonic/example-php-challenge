<?php
class LoginForm extends CFormModel {
	public $username;
	public $password;
	public $rememberMe;

	private $force = false;
	private $_identity;

	public function __construct($force=false) {
		$this->force = $force;
	}
	
	public function rules() {
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'rememberMe'=>'Remember Me',
		);
	}
	
	public function authenticate($attribute,$params) {
		if(!$this->hasErrors()) {
			$this->_identity = new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate($this->force)) {
				$this->addError('password','Incorrect username or password.');
			}
		}
	}
	
	public function login() {
		if($this->_identity === null) {
			$this->_identity = new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration = $this->rememberMe ? 3600*24 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
