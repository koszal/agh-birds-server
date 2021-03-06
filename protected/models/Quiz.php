<?php

/**
 * This is the model class for table "quiz".
 *
 * The followings are the available columns in table 'quiz':
 * @property integer $id
 * @property string $api_user_key
 * @property integer $time_limit
 * @property integer $is_closed
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Question[] $questions
 * @property ApiUser $apiUserKey
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
			array('api_user_key, created_at', 'required'),
			array('time_limit, is_closed', 'numerical', 'integerOnly'=>true),
			array('api_user_key', 'length', 'max'=>31),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, api_user_key, time_limit, is_closed, created_at', 'safe', 'on'=>'search'),
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
			'apiUserKey' => array(self::BELONGS_TO, 'ApiUser', 'api_user_key'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'api_user_key' => 'Api User Key',
			'time_limit' => 'Time Limit',
			'is_closed' => 'Is Closed',
			'created_at' => 'Created At',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('api_user_key',$this->api_user_key,true);
		$criteria->compare('time_limit',$this->time_limit);
		$criteria->compare('is_closed',$this->is_closed);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}