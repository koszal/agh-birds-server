<?php


class Bird_01_Controller extends RestController
{
    
    const API_LEVEL = 1;
    
    public function actionList($api_key = null, $query = null, $order = null, $family = null, $genus = null, $country = null) {

        $apiUser = ApiUser::authenticate($api_key);
        if($apiUser == null) {
            $this->responseError("Unauthorized", 401);
        }
      
        $birds = Yii::app()->db->createCommand()
                ->select('b.id, b.name, b.description, b.order, b.family, b.genus')
                ->from('bird b');
        
        if($country != null)
        $birds->join('bird_has_country h', 'b.id=h.bird_id')
                ->join('country c', 'h.country_id=c.id')
                ->where(array('like', 'c.name', '%' . $country . '%'));
        
        
        if($query != null)
            $birds->where(array('like', 'name', '%' . $query . '%'));
        
        if($order != null)
            $birds->where(array('like', 'order', '%' . $order . '%'));
        
        if($family != null)
            $birds->where(array('like', 'family', '%' . $family . '%'));
        
        if($genus != null)
            $birds->where(array('like', 'genus', '%' . $genus . '%'));
        
        $birds = $birds->queryAll();
        
        
        
        $birdList = array();
        
        $meta = array(
            'previous' => null,
            'next' => null,
            'total' => count($birds),
            'offset' => 0,
            'limit' => 20
        );
                
        
        $this->responseList($birds, $meta);   
    }
    
    public function actionView($api_key, $id)
    {
        
        $apiUser = ApiUser::authenticate($api_key);
        if($apiUser == null) {
            $this->responseError("Unauthorized", 401);
        }
        
        $object = Bird::model()->with('countries', 'medias')->findByPk($id);
        
        $bird = $object->getAttributes();
        
        $bird['countries'] = $object->countries;
        $bird['medias'] = $object->medias;
        
        if($object != null)
        {
            $this->responseObject($bird);
        } else {
            $this->responseError('Not found', 404);
        }
        
    }
    
}