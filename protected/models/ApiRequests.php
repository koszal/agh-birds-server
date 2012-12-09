<?php

/**
 * This is the model class for table "api_requests".
 *
 * The followings are the available columns in table 'api_requests':
 * @property integer $id
 * @property string $created_at
 * @property string $url
 * @property string $api_user_key
 *
 * The followings are the available model relations:
 * @property ApiUser $apiUserKey
 */
class ApiRequests extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ApiRequests the static model class
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
		return 'api_requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, url, api_user_key', 'required'),
			array('url', 'length', 'max'=>1024),
			array('api_user_key', 'length', 'max'=>31),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created_at, url, api_user_key', 'safe', 'on'=>'search'),
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
			'created_at' => 'Created At',
			'url' => 'Url',
			'api_user_key' => 'Api User Key',
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
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('api_user_key',$this->api_user_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}