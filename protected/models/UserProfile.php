<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $phone
 * @property string $cell
 * @property integer $country
 * @property integer $state
 * @property string $city
 * @property string $address
 * @property string $address2
 * @property string $zipcode
 * @property string $image
 * @property string $biography
 * @property string $website
 * @property string $facebook
 * @property string $twitter
 * @property string $youtube
 * @property string $googleplus
 * @property string $linkedin
 * @property string $pinterest
 * @property string $instagram
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class UserProfile extends Model {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'user_profile';
	}
	
	public function rules() {
		return array(
			//array('name, create_time, update_time, create_by, update_by', 'required'),
			//array('country, state', 'numerical', 'integerOnly'=>true),
			array('country, state', 'length', 'max'=>2),
			array('zipcode', 'length', 'max'=>10),
			array('phone, cell', 'length', 'max'=>20),
			array('first_name, last_name, title', 'length', 'max'=>45),
			array('city, address, address2', 'length', 'max'=>50),
			array('image, website, facebook, twitter, youtube, googleplus, linkedin, pinterest, instagram', 'length', 'max'=>255),
			array('website, facebook, twitter, youtube, googleplus, linkedin, pinterest, instagram', 'url', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, phone, cell, country, state, city, address, address2, zipcode, image, website, facebook, twitter, youtube, googleplus, linkedin, pinterest, instagram', 'safe', 'on'=>'search'),
		);
	}
	
	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'id'),
		);
	}
	
	public function getFullName(){
		//if($this->type == 1) {
			//return $this->firstName.' '.$this->lastName;
		//}
		//elseif($this->type == 2) {
			//return $this->name;
		//}
		return $this->first_name.' '.$this->last_name;
	}
	
	public function beforeSave() {
		/*if ($this->isNewRecord) {
			//do nothing
		}
	   	else {
			$this->update_time = new CDbExpression('NOW()');
		}*/
	 	
		$this->update_time = new CDbExpression('NOW()');
	    return parent::beforeSave();
	}
	
	public function attributeLabels() {
		return array(
			/*'id' => 'ID',
			'name' => 'Name',
			'create_time' => 'Created',
			'update_time' => 'Updated',
			'create_by' => 'Creator',
			'update_by' => 'Updater',*/
		);
	}
	
	public static function getNameById($id) {
		return self::model()->findByPK($id)->name;
	}
	
	public function search() {
		/*$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_by',$this->update_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
	}
}
