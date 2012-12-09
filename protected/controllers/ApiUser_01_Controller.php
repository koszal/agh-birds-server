<?php


class ApiUser_01_Controller extends RestController
{
    
    const API_LEVEL = 1;
    
 
    
    public function actionCreate()
    {
        
        $apiUser = new ApiUser;
        $apiUser->created_at = new CDbExpression('NOW()');
        $apiUser->key = uniqid();
        if($apiUser->save()) {
            $apiUser->refresh();
            $this->responseObject($apiUser);
        } else {
            $this->responseError("Internal Server Error", 500);
        }
        
    }
    
    
    
}