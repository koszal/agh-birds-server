<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property string $question
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property integer $correct
 * @property integer $user_answer
 * @property string $created_at
 * @property string $modified_at
 * @property string $deleted_at
 * @property integer $active
 * @property string $quiz_id
 *
 * The followings are the available model relations:
 * @property Quiz $quiz
 */
class Question extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Question the static model class
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
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, answer1, answer2, answer3, answer4, correct, created_at, active, quiz_id', 'required'),
			array('correct, user_answer, active', 'numerical', 'integerOnly'=>true),
			array('question, answer1, answer3, answer4', 'length', 'max'=>256),
			array('answer2', 'length', 'max'=>45),
			array('quiz_id', 'length', 'max'=>10),
			array('modified_at, deleted_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question, answer1, answer2, answer3, answer4, correct, user_answer, created_at, modified_at, deleted_at, active, quiz_id', 'safe', 'on'=>'search'),
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
			'quiz' => array(self::BELONGS_TO, 'Quiz', 'quiz_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question' => 'Question',
			'answer1' => 'Answer1',
			'answer2' => 'Answer2',
			'answer3' => 'Answer3',
			'answer4' => 'Answer4',
			'correct' => 'Correct',
			'user_answer' => 'User Answer',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
			'deleted_at' => 'Deleted At',
			'active' => 'Active',
			'quiz_id' => 'Quiz',
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
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer1',$this->answer1,true);
		$criteria->compare('answer2',$this->answer2,true);
		$criteria->compare('answer3',$this->answer3,true);
		$criteria->compare('answer4',$this->answer4,true);
		$criteria->compare('correct',$this->correct);
		$criteria->compare('user_answer',$this->user_answer);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);
		$criteria->compare('deleted_at',$this->deleted_at,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('quiz_id',$this->quiz_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}