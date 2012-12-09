<?php

/**
 * This is the model class for table "bird".
 *
 * The followings are the available columns in table 'bird':
 * @property integer $id
 * @property string $name
 * @property string $latin_name
 * @property string $description
 * @property string $order
 * @property string $family
 * @property string $genus
 * @property string $species
 * @property string $created_at
 * @property string $modified_at
 *
 * The followings are the available model relations:
 * @property Country[] $countries
 * @property Media[] $medias
 */
class Bird extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bird the static model class
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
		return 'bird';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, latin_name, description, order, family, genus, species, created_at', 'required'),
			array('name, latin_name', 'length', 'max'=>255),
			array('order, family, genus, species', 'length', 'max'=>127),
			array('modified_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, latin_name, description, order, family, genus, species, created_at, modified_at', 'safe', 'on'=>'search'),
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
			'countries' => array(self::MANY_MANY, 'Country', 'bird_has_country(bird_id, country_id)'),
			'medias' => array(self::HAS_MANY, 'Media', 'bird_id'),
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
			'latin_name' => 'Latin Name',
			'description' => 'Description',
			'order' => 'Order',
			'family' => 'Family',
			'genus' => 'Genus',
			'species' => 'Species',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
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
		$criteria->compare('latin_name',$this->latin_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('order',$this->order,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('genus',$this->genus,true);
		$criteria->compare('species',$this->species,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}