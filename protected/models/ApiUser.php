<?php

/**
 * This is the model class for table "api_user".
 *
 * The followings are the available columns in table 'api_user':
 * @property string $key
 * @property string $created_at
 * @property string $modified_at
 *
 * The followings are the available model relations:
 * @property ApiRequests[] $apiRequests
 * @property Quiz[] $quizs
 */
class ApiUser extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ApiUser the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'api_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('key, created_at', 'required'),
            array('key', 'length', 'max' => 31),
            array('modified_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('key, created_at, modified_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'apiRequests' => array(self::HAS_MANY, 'ApiRequests', 'api_user_key'),
            'quizs' => array(self::HAS_MANY, 'Quiz', 'api_user_key'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'key' => 'Key',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('key', $this->key, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('modified_at', $this->modified_at, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function authenticate($api_key) {
        return ApiUser::model()->findByPk($api_key);
    }
    
}