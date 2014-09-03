<?php
class CruisesInternationalController extends AppController
{
    function index(){
        $this->loadModel('Cruiseline');
        $this->set('cruises',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>'sort')));
        $this->set('cruiseline',$this->Cruiseline);
        
    }    
}