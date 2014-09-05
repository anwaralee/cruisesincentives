<?php
class ResourcesController extends AppController {
    
   function index()
   {
        $this->loadModel('Page');
        $model = $this->Page->findBySlug('resource-center');
        $this->set('page',$model);
        $this->set('resources',$this->Resource->find('all'));
        $this->set('seoTitle',$model['Page']['seo_title']);
        $this->set('seoDesc',$model['Page']['seo_desc']);
        
   }
   
   function pdf($slug)
   {
        $r = $this->Resource->findBySlug($slug);
        $this->loadModel('ResourcePdf');
        $this->set('title',$r['Resource']['title']);
        $this->set('pdfs',$this->ResourcePdf->find('all',array('conditions'=>array('resource_id'=>$r['Resource']['id'],'parent_id'=>'0'))));
        $this->set('child',$this->ResourcePdf);
        $this->set('seoTitle',$r['Resource']['title']);
        $this->set('seoDesc',substr($r['Resource']['desc'],0,250));
   }
   function download($file) {
        //echo APP . 'outside_webroot_dir' . DS; die();
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        
        $params = array(
            'id'        => $file,
            'download'  => true,
            'path'      => APP . 'webroot/pdf/'
        );
        $this->set($params);
    } 
   
}
    