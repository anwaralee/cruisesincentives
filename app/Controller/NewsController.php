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
        $this->set('seoTitle',$n['News']['seo_title']);
        $this->set('seoDesc',$n['News']['seo_desc']);
    }
    function getnewsletter()
    {
        $this->loadModel('Newsletter');
        return $this->Newsletter->find('all');
    }
    function getnews()
    {
        
        return $this->News->find('all',array('limit'=>'5','order'=>'id DESC'));
    }
    
    function getcsi()
    {
        
        $this->loadModel('Csi');
        return $this->Csi->find('all');
    }
}