<?php


class Question_01_Controller extends RestController
{
    
    const API_LEVEL = 1;
    
    public function actionList() {
        $objects = Bird::model()->findAll();
        $meta = array(
            'previous' => null,
            'next' => null,
            'total' => count($objects),
            'offset' => 0,
            'limit' => 20
        );
        
        $this->responseList($objects, $meta);   
    }
    
    public function actionView($id)
    {
        $object = Bird::model()->findByPk($id);
        
        if($object != null)
        {
            $this->responseObject($object);
        } else {
            $this->responseError('Not found', 404);
        }
        
    }
    
    public function actionCreate($api_key, $question_id, $answer) {
        
        $apiUser = ApiUser::authenticate($api_key);
        if($apiUser == null) {
            $this->responseError("Unauthorized", 401);
        }
        
        $question = Question::model()->findByPk($question_id);
        $question->users_answer = $answer;
        $question->save();
        
        $this->responseObject($question);
        
    }
    
}