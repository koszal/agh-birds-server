<?php

/**
 * This is the model class for table "classification".
 *
 * The followings are the available columns in table 'classification':
 * @property string $id
 * @property string $bird_id
 * @property string $order_name
 * @property string $family
 * @property string $genus
 */
class Classification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Classification the static model class
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
		return 'classification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bird_id', 'required'),
			array('bird_id', 'length', 'max'=>10),
			array('order_name, family, genus', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bird_id, order_name, family, genus', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bird_id' => 'Bird',
			'order_name' => 'Order Name',
			'family' => 'Family',
			'genus' => 'Genus',
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
		$criteria->compare('bird_id',$this->bird_id,true);
		$criteria->compare('order_name',$this->order_name,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('genus',$this->genus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}