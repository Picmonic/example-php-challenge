<?php

/**
 * This is the model class for table "user_roles".
 *
 * The followings are the available columns in table 'user_roles':
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 * @property string $create_by
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class UserRoles extends Model {
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserRoles the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'user_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_time, update_time, create_by, update_by', 'required'),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, create_time, update_time, create_by, update_by', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->create_time = new CDbExpression('NOW()');
			$this->update_time = new CDbExpression('NOW()');
			$this->create_by = Yii::app()->user->id;
			$this->update_by = Yii::app()->user->id;
		}
	   	else {
			$this->update_time = new CDbExpression('NOW()');
			$this->update_by = Yii::app()->user->id;
		}
	 
	    return parent::beforeSave();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users' => array(self::HAS_MANY, 'User', 'user_role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'create_time' => 'Created',
			'update_time' => 'Updated',
			'create_by' => 'Creator',
			'update_by' => 'Updater',
		);
	}
	
	public static function getNameById($id) {
		return self::model()->findByPK($id)->name;
	}
	
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_by',$this->update_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
