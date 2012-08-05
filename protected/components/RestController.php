<?php

class RestController extends Controller
{
    
    public $contentType = 'application/json';
    
    public function filters()
    {
        return array();        
    }
    
    public function actionList()
    {
        
    }
    
    public function actionView()
    {
        
    }
    
    public function actionCreate()
    {
        
    }
    
    public function actionUpdate()
    {
        
    }
    
    public function actionDelete()
    {
        
    }
    
    public function responseList($list, $meta)
    {
        $body = array(
            'meta' => $meta,
            'objects' => $list
        );
        $this->sendResponse(CJSON::encode($body));
    }
    
    public function responseObject($object)
    {
        $body = $object;
        $this->sendResponse(CJSON::encode($body));
    }
    
    public function responseError($message, $code, $internalCode = null, $internalMessage = null)
    {
        $body = array(
            'error_object' => array(
                'httpCode' => $code,
                'httpMessage' => $message,
                'internalCode' => $internalCode,
                'internalMessage' => $internalMessage
            )
        );
        $this->sendResponse(CJSON::encode($body), $code, $message);
    }
    
    public function sendResponse($body, $code = 200, $message = "OK")
    {
        header("HTTP/1.1 " . $code . " " . $message);
        header("Content-type: " . $this->contentType);
                
        echo $body;
        
        exit();
    }
    
}