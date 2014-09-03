<?php
class NewsController extends AppController{
    
    function all()
    {
        $this->set('news',$this->News->find('all'));
        
    }
    function index($slug)
    {
        
    }
    function getnews()
    {
        
        return $this->News->find('all',array('limit'=>'5'));
    }
    
    function getcsi()
    {
        
        $this->loadModel('Csi');
        return $this->Csi->find('all');
    }
}