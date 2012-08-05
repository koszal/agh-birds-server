<?php


class Bird_01_Controller extends RestController
{
    
    const API_LEVEL = 1;
    
    public function actionList() {
        
        $meta = array(
            'previous' => null,
            'next' => null,
            'total' => 2,
            'offset' => 0,
            'limit' => 20
        );
        
        $objects = array(
            array(
                'id' => 1,
                'name' => 'Sikorka',
                'description' => 'Taki żółty ptak'
            ),
            array(
                'id' => 2,
                'name' => 'Wróbel',
                'description' => 'Inny ptak'
            )
        );
        
        $output = array(
            'meta' => $meta,
            'objects' => $objects,
        );
        
        header("Content-type: " . $this->contentType);
        
        echo CJSON::encode($output);
        
    }
    
}