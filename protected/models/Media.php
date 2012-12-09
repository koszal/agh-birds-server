<?php

/**
 * This is the model class for table "media".
 *
 * The followings are the available columns in table 'media':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $filename
 * @property string $mime_type
 * @property string $created_at
 * @property string $modified_at
 * @property string $resource_type
 * @property integer $bird_id
 *
 * The followings are the available model relations:
 * @property Bird $bird
 * @property Question[] $questions
 */
class Media extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Media the static model class
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
		return 'media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, filename, mime_type, created_at, resource_type, bird_id', 'required'),
			array('bird_id', 'numerical', 'integerOnly'=>true),
			array('name, filename', 'length', 'max'=>255),
			array('mime_type', 'length', 'max'=>63),
			array('resource_type', 'length', 'max'=>5),
			array('modified_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, filename, mime_type, created_at, modified_at, resource_type, bird_id', 'safe', 'on'=>'search'),
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
			'bird' => array(self::BELONGS_TO, 'Bird', 'bird_id'),
			'questions' => array(self::HAS_MANY, 'Question', 'media_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'filename' => 'Filename',
			'mime_type' => 'Mime Type',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
			'resource_type' => 'Resource Type',
			'bird_id' => 'Bird',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('mime_type',$this->mime_type,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);
		$criteria->compare('resource_type',$this->resource_type,true);
		$criteria->compare('bird_id',$this->bird_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}