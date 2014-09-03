<?php
class DestinationsController extends AppController {
    
   function index()
   {
        $this->loadModel('Pages');
        $this->set('page',$this->Pages->findBySlug('destinations'));
        $this->loadModel('Highlight');
        $this->set('highlight',$this->Highlight);
        $this->set('destinations',$this->Destination->find('all'));
        
   } 
   function getbanners()
   {
        $this->loadModel('Banner');
        return $this->Banner->find('all');
   }
}
    