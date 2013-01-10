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
        
        if ($object != null) {
            $this->responseObject($object);
        } else {
            $this->responseError('Not found', 404);
        }
    }

    public function actionCreate($api_key, $quiz_id = null) {
        
        $apiUser = ApiUser::authenticate($api_key);
        if($apiUser == null) {
            $this->responseError("Unauthorized", 401);
        }
        
        if($quiz_id != null) {
            $quiz = Quiz::model()->findByPk($quiz_id);
            $quiz->is_closed = 1;
            $quiz->save();
            $this->responseObject($quiz);
        }
        
        $medias = Media::model()->with('bird')->findAll('resource_type=:type', array(':type'=>'image'));
        $objects = array_rand($medias, 10);
        
        
        $questionTexts = array('Picture above shows...', 'What bird is on picture above?', 'What bird is that?', 'Bird on picture above is...');
        
        $quiz = new Quiz;
        $quiz->api_user_key = $apiUser->key;
        $quiz->time_limit = 600;
        $quiz->is_closed = 0;
        $quiz->created_at = new CDbExpression('NOW()');
        $quiz->save();
        $quiz->refresh();
        
        $questions = array();
        foreach($objects as $index) {
            $current = $medias[$index];
            
            $wrongAnswers =  Yii::app()->db->createCommand()
                    ->select('name')
                    ->from('bird')
                    ->where('name!=:name', array(':name'=>$current->bird->name))
                    ->limit(4)
                    ->order('RAND()')
                    ->queryAll();
            $question = new Question;
            $question->question = $questionTexts[array_rand($questionTexts)];
            
            $question->correct_answer = rand(1, 4);
            
            for($i = 1; $i<=4; $i++) {
                $attr = 'answer' . $i;
                if($i == $question->correct_answer) {
                    $question->$attr = $current->bird->name;
                } else {
                    $question->$attr = $wrongAnswers[$i-1]['name'];
                }
            }
            
            $question->media_id = $current->id;
            $question->quiz_id = $quiz->id;
            $question->users_answer = 0;
            
            $question->save();
            
            $questions[] = $question;
        }
        
        $quiz->questions = $questions;
        
        $this->responseObject($quiz);
        

        //TODO transaction

//        $quiz = new Quiz;
//        $quiz->created_at = new CDbExpression('NOW()');
//        $quiz->time_limit = 10 * 60; //TODO hardcoded
//        //$questions = array();
//        $connection=Yii::app()->db;
//        $transaction = $connection->beginTransaction();
//
//        try {
//
//            if ($quiz->save()) {
//
//                $quiz->refresh();
//
//                for ($i = 0; $i < 10; $i++) {
//                    $question = new Question;
//                    $question->active = 1;
//                    $question->question = "Sample question " . $i . "?";
//                    $question->answer1 = "answer 1";
//                    $question->answer2 = "answer 2";
//                    $question->answer3 = "answer 3";
//                    $question->answer4 = "answer 4";
//                    $question->correct = rand(1, 4);
//                    $question->created_at = new CDbExpression('NOW()');
//                    $question->quiz_id = $quiz->id;
//
//                    if (!$question->save()) {
//                        throw new Exception('failed to save question');
//                    }
//                }
//                $transaction->commit();
//                $this->responseObject($quiz);
//            } else {
//                throw new Exception('failed to save quiz');
//            }
//        } catch (Exception $e) {
//            $transaction->rollback();
//            $this->responseError($e->getMessage(), 500);
//        }
    }

    private function getQuiz($id) {
        $object = Quiz::model()->with('questions')->findByPk($id);
        $questions = $object->questions;
        
        $questionsWithMedias = array();
        foreach($questions as $question) {
         
            $q = $question->getAttributes();
            $q['media'] = $question->media;
            $questionsWithMedias[] = $q;
        }       
       
        
        $attrs = $object->getAttributes();
        $attrs['questions'] = $questionsWithMedias;

        return $attrs;
    }

}