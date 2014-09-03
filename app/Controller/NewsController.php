<?php
class NewsController extends AppController{
    
    function all()
    {
        $this->set('news',$this->News->find('all'));
        
    }
    function index($slug)
    {
        $this->loadModel('Image');
        $n = $this->News->findBySlug($slug);
        $this->set('model',$n);
        $this->set('news',$this->News->find('all'));
        $this->set('images', $this->Image->find('all',array('conditions'=>array('type'=>'news','type_id'=>$n['News']['id']),'limit'=>3,'order'=>'rand()')));
        
    }
    function getnewsletter()
    {
        $this->loadModel('Newsletter');
        return $this->Newsletter->find('all');
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