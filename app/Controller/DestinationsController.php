<?php
class DestinationsController extends AppController {
    
   function index()
   {
        $this->loadModel('Pages');
        $q = $this->Pages->findBySlug('destinations');
        $this->set('page',$q);
        $this->loadModel('Highlight');
        $this->set('highlight',$this->Highlight);
        $this->set('destinations',$this->Destination->find('all',array('order'=>'title')));
        $this->set('seoTitle',$q['Pages']['seo_title']);
        $this->set('seoDesc',$q['Pages']['seo_desc']);
        
   } 
   function getbanners()
   {
        $this->loadModel('Banner');
        return $this->Banner->find('all',array('limit'=>'2','order'=>'rand()'));
   }
}
    