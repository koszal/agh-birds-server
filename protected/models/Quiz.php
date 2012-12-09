<?php

/**
 * This is the model class for table "quiz".
 *
 * The followings are the available columns in table 'quiz':
 * @property string $id
 * @property integer $time_limit
 * @property string $created_at
 * @property string $deleted_at
 * @property string $closed_at
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Question[] $questions
 */
class Quiz extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Quiz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quiz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at', 'required'),
			array('time_limit, active', 'numerical', 'integerOnly'=>true),
			array('deleted_at, closed_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, time_limit, created_at, deleted_at, closed_at, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'questions' => array(self::HAS_MANY, 'Question', 'quiz_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'time_limit' => 'Time Limit',
			'created_at' => 'Created At',
			'deleted_at' => 'Deleted At',
			'closed_at' => 'Closed At',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('time_limit',$this->time_limit);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('deleted_at',$this->deleted_at,true);
		$criteria->compare('closed_at',$this->closed_at,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}