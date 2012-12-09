<?php


class Bird_01_Controller extends RestController
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
    
}