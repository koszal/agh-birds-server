<?php

class Quiz_01_Controller extends RestController {

    const API_LEVEL = 1;

    public function actionList() {
        $objects = Quiz::model()->findAll();
        $meta = array(
            'previous' => null,
            'next' => null,
            'total' => count($objects),
            'offset' => 0,
            'limit' => 20
        );

        $this->responseList($objects, $meta);
    }

    public function actionView($id) {
        $object = $this->getQuiz($id);

        sleep(1);
        
        if ($object != null) {
            $this->responseObject($object);
        } else {
            $this->responseError('Not found', 404);
        }
    }

    public function actionCreate() {
        parent::actionCreate();

        //TODO transaction

        $quiz = new Quiz;
        $quiz->created_at = new CDbExpression('NOW()');
        $quiz->time_limit = 10 * 60; //TODO hardcoded
        //$questions = array();
        $connection=Yii::app()->db;
        $transaction = $connection->beginTransaction();

        try {

            if ($quiz->save()) {

                $quiz->refresh();

                for ($i = 0; $i < 10; $i++) {
                    $question = new Question;
                    $question->active = 1;
                    $question->question = "Sample question " . $i . "?";
                    $question->answer1 = "answer 1";
                    $question->answer2 = "answer 2";
                    $question->answer3 = "answer 3";
                    $question->answer4 = "answer 4";
                    $question->correct = rand(1, 4);
                    $question->created_at = new CDbExpression('NOW()');
                    $question->quiz_id = $quiz->id;

                    if (!$question->save()) {
                        throw new Exception('failed to save question');
                    }
                }
                $transaction->commit();
                $this->responseObject($quiz);
            } else {
                throw new Exception('failed to save quiz');
            }
        } catch (Exception $e) {
            $transaction->rollback();
            $this->responseError($e->getMessage(), 500);
        }
    }

    private function getQuiz($id) {
        $object = Quiz::model()->with('questions')->findByPk($id);
        $questions = $object->questions;
        
       
        
        $attrs = $object->getAttributes();
        $attrs['questions'] = $questions;

        return $attrs;
    }

}