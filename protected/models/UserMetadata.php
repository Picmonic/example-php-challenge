<?php

/**
 * This is the model class for table "user_metadata".
 *
 * The followings are the available columns in table 'user_metadata':
 * @property integer $id
 * @property integer $user_id
 * @property string $key
 * @property string $value
 * @property string $create_time
 * @property string $update_time
 * @property string $create_by
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserMetadata extends Model {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'user_metadata';
	}
	
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, key, value', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('key, value', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, key, value', 'safe', 'on'=>'search'),
		);
	}
	
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'key' => 'Key',
			'value' => 'Value',
		);
	}
	
	public function search() {
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/*
	public function beforeSave() {
    	if ($this->isNewRecord) {
			$this->create_time = new CDbExpression('NOW()');
			$this->create_by = Yii::app()->user->id;
		}
		
		$this->update_time = new CDbExpression('NOW()');
		$this->update_by = Yii::app()->user->id;
		
	    return parent::beforeSave();
	}
	*/
}
