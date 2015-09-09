<?php

/**
 * This is the model class for table "user_groups".
 *
 * The followings are the available columns in table 'user_groups':
 * @property integer $id
 * @property integer $group_id
 * @property integer $user_id
 * @property string $create_time
 * @property string $update_time
 * @property string $create_by
 * @property string $update_by
 */
class UserGroups extends Model {
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserGroups the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'user_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, user_id, create_time, update_time, create_by, update_by', 'required'),
			array('group_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, user_id, create_time, update_time, create_by, update_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'user_id' => 'User',
			'create_time' => 'Created',
			'update_time' => 'Updated',
			'create_by' => 'Creator',
			'update_by' => 'Updater',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_by',$this->update_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
}
