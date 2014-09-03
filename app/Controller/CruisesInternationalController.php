<?php
class CruisesInternationalController extends AppController
{
    function index($slug=""){
        $this->loadModel('Cruiseline');
        $this->loadModel('Image');
        $this->set('cruises',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>'sort')));
        $this->set('cruiseline',$this->Cruiseline);
        if($slug=="")
            $model = $this->Cruiseline->find('first',array('conditions'=>array('parent_id'=>0),'order'=>'sort'));
        else
            $model = $this->Cruiseline->findBySlug($slug);
        $this->set('model',$model);
        $this->set('images', $this->Image->find('all',array('conditions'=>array('type'=>'cruises','type_id'=>$model['Cruiseline']['id']),'limit'=>3,'order'=>'rand()')));
    }    
}