<?php
class AdminController extends AppController
{
    public $components = array('ImageCropResize.Image');
    
    //var $helpers = array('Cropimage');
    //var $components = array(..., 'JqImgcrop'); 
    function beforeFilter() //is called before any other function is called
    {
        $this->loadModel('Banner');
        $this->layout='admin';
       if(!$this->Session->read('admin'))
        {
            $this->redirect('/login');
        }
            
        
    }
    function index()
    {
        
    }
    function cruiseline()
    {
        $this->loadModel('Cruiseline');
        $this->set('cruiselines',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>array('sort'=>'ASC'))));
        $this->set('cl',$this->Cruiseline);
    }
    function cruiseline_add()
    {
        $this->loadModel('Cruiseline');
        $this->set('cruiselines',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>array('sort'=>'ASC'))));
        $this->set('cl',$this->Cruiseline);
        
        //$this->set('cruiselines',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>array('sort'=>'ASC'))));
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v ){
                $arr[$k] =$v;
            }
            $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
            $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
            $arr['slug'] = preg_replace($pattern, '_', (string) $arr['title']);
            
            if($x = $this->Cruiseline->find('first',array('conditions'=>array('slug'=>$arr['slug']))))
            $arr['slug']=$arr['slug'].'_'.$x['Cruiseline']['id'];
            $this->Cruiseline->create();
            if($this->Cruiseline->save($arr))
            {
                $id = $this->Cruiseline->id;
                $this->Session->setFlash("Cruiseline Saved.");
                $this->redirect("cruiseline");
            }
        
         $this->loadModel('Image');
         $this->Image->deleteAll(array('type_id'=>$id,'type'=>'cruises'));
          foreach($_POST['images'] as $image)
          {
                $img['file']= $image;
                $img['type_id'] = $id;
                $img['type'] = 'cruises';
                $this->Image->create();
                if($this->Image->save($img))
                {
                    $source1 = APP."webroot/doc/temp/thumb/".$image;
                    $destination1 = APP."webroot/doc/thumb1/".$image;
                    if(copy($source1,$destination1))
                    unlink(APP."webroot/doc/temp/thumb/".$image);
                }
          }
        }
        $this->render('cruiseline_edit');
    }
    
    function cruiseline_edit($id)
    {
        
        $this->loadModel('Cruiseline');
        //$this->set('cruiselines',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>array('sort'=>'ASC'))));
        $this->set('cl',$this->Cruiseline);
        $this->set('cruiselines',$this->Cruiseline->find('all',array('conditions'=>array('parent_id'=>0),'order'=>array('sort'=>'ASC'))));
        $this->set('cruise1',$this->Cruiseline->findById($id));
        if(isset($_POST['submit']))
        {
            $this->Cruiseline->id = $id;
            foreach($_POST as $k=>$v ){
                $this->Cruiseline->saveField($k,$v);
            }
             $this->loadModel('Image');
             $this->Image->deleteAll(array('type_id'=>$id,'type'=>'cruises'));
              foreach($_POST['images'] as $image)
              {
                    $img['file']= $image;
                    $img['type_id'] = $id;
                    $img['type'] = 'cruises';
                    $this->Image->create();
                    if($this->Image->save($img))
                    {
                        $source1 = APP."webroot/doc/temp/thumb/".$image;
                        $destination1 = APP."webroot/doc/thumb1/".$image;
                        if(copy($source1,$destination1))
                        unlink(APP."webroot/doc/temp/thumb/".$image);
                    }
              }
            
                $this->Session->setFlash("Cruiseline Updated.");
                $this->redirect("cruiseline");
        }
        
    }
    function cruiseline_delete($id)
    {
        $this->loadModel("Cruiseline");
        if($c = $this->Cruiseline->findById($id))
        {
            $parent_id =$c['Cruiseline']['parent_id'];
            //die($parent_id);
            if($parent_id == 0)
            {
                $this->Cruiseline->deleteAll(array('parent_id'=>$c['Cruiseline']['id']));
                
            }
            if($this->Cruiseline->delete(array('id'=>$id)))
            {
                $this->Session->setFlash('Cruiseline Deleted.');
                
            }
            
        }
        $this->redirect("cruiseline");
        
    }
    
    function destinations($id ="")
    {
        $this->loadModel('Destination');
        $this->loadModel('Highlight');
        $this->set('destinations',$this->Destination->find('all'));
        if($id!="")
        {
            $this->set('dest',$this->Destination->findById($id));
            $this->set('high',$this->Highlight->find('all',array('conditions'=>array('destination_id'=>$id))));
            if(isset($_POST['submit']))
            {
                $this->Destination->id = $id;
                foreach($_POST as $k=>$val)
                {
                    $this->Destination->saveField($k,$val);
                    if($k == 'youtube_link' && $val != "")
                    {
                        $url = $val;
                        parse_str( parse_url( $url, PHP_URL_QUERY ) );
                        $this->Destination->saveField('thumb_img',"http://img.youtube.com/vi/".$v."/1.jpg");
                    }
                }
                $this->Highlight->deleteAll(array('destination_id'=>$id));
                foreach($_POST['highlight'] as $desc)
                {
                    $high['destination_id'] = $id;
                    $high['desc'] =$desc;
                    $this->Highlight->create();
                    $this->Highlight->save($high);
                }
                $this->Session->setFlash("Destination Updated");
                $this->redirect("");
            }
        }
    }
    function news($id = ""){
        $this->loadModel('News');
        $this->loadModel("Image");
        $this->set('id',$id);
        $this->set('allnews',$this->News->find('all'));
        if($id != "" && $id != "add")
        {
            $this->set('news',$this->News->findById($id));
            
            
        }
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);
          foreach($_POST as $k=>$v)
          {
            if($k =='banner')
                $banner= $v;
            if($id =="add")
            {
                $new[$k] = $v;
                $new['added_on'] = date('Y-m-d H:i:s');
            } 
           else
            {
                $this->News->id = $id;
                $this->News->saveField($k,$v);
            }
          }
            $source = APP."webroot/doc/temp/thumb/".$banner;
            $destination = APP."webroot/doc/thumb/".$banner;
            if(copy($source,$destination))
            unlink(APP."webroot/doc/temp/thumb/".$banner);
            /*
            App::uses('Resizes', 'resize');
            $img = new Resizes();
            $img->load(APP.'webroot/doc/thumb/'.$banner);
            $ty= $img->getimgtype(APP.'webroot/doc/thumb/'.$banner);
            $img->resizeToWidth(120);
        
            $img->save(APP.'webroot/doc/thumb1/'.$banner,$ty);
            */
            
          if($id =="add"){
            $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
            $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
            $new['slug'] = preg_replace($pattern, '_', (string) $new['title']);
             if($x = $this->News->find('first',array('conditions'=>array('slug'=>$new['slug']))))
                $new['slug']=$new['slug'].'_'.$x['News']['id'];
            $this->News->create();
          
              if($this->News->save($new))
              {
                $id = $this->News->id;
                $this->Session->setFlash("News/ Deal Added.");
                
              } 
          }
          
          $this->Image->deleteAll(array('type_id'=>$id,'type'=>'news'));
          foreach($_POST['images'] as $image)
          {
                $img['file']= $image;
                $img['type_id'] = $id;
                $img['type'] = 'news';
                $this->Image->create();
                if($this->Image->save($img))
                {
                    $source1 = APP."webroot/doc/temp/thumb/".$image;
                    $destination1 = APP."webroot/doc/thumb1/".$image;
                    if(copy($source1,$destination1))
                    unlink(APP."webroot/doc/temp/thumb/".$image);
                }
          }
           $this->Session->setFlash("News/ Deal Updated.");
          $this->redirect("news");
        }
        
    }
    function news_delete($id)
    {
        $this->loadModel('News');
        $this->loadModel('Image');
        $img = $this->News->findById($id);
        $img = $img['News']['banner'];
        $imgs = $this->Image->find('all',array('conditions'=>array('type_id'=>$id,'type'=>'news')));
        foreach($imgs as $i)
        {
            $im = $i['Image']['file'];
            unlink(APP."webroot/doc/thumb/".$im);
            unlink(APP."webroot/doc/thumb1/".$im);
            unlink(APP."webroot/doc/temp/".$im);
        }
        $this->Image->deleteAll(array('type_id'=>$id,'type'=>'news'));
        if($this->News->delete(array('id'=>$id)))
        {
            unlink(APP."webroot/doc/thumb/".$img);
            unlink(APP."webroot/doc/thumb1/".$img);
            unlink(APP."webroot/doc/temp/".$img);
            $this->Session->setFlash("News Deleted.");
            $this->redirect('news');
        }
    }
    
    function csi($id="")
    {
        $this->loadModel('Csi');
        $this->set('csi',$this->Csi->find('all'));
        $this->set('id',$id);
        if($id!="" && $id!='add')
        {
            $this->set('csi1',$this->Csi->findById($id));
        }
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);
          foreach($_POST as $k=>$v)
          {
            
            if($id =="add")
                $new[$k] = $v;
            else
            {
                $this->Csi->id = $id;
                $this->Csi->saveField($k,$v);
            }
          }
            
          if($id =="add"){
            $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
            $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
            $new['slug'] = preg_replace($pattern, '_', (string) $new['title']);
             if($x = $this->Csi->find('first',array('conditions'=>array('slug'=>$new['slug']))))
                $new['slug']=$new['slug'].'_'.$x['News']['id'];
            $this->Csi->create();
          
              if($this->Csi->save($new))
              {
                $this->Session->setFlash("CSI Added.");
                
              } 
          }
          $this->redirect("csi");
        }
        
    }
    function csi_delete($id)
    {
        $this->loadModel('Csi');
        if($this->Csi->delete(array('id'=>$id)))
        {
            $this->Session->setFlash('CSI deleted.');
            $this->redirect('csi');
        }
    }
    function sort()
    {
        $this->loadModel('Cruiseline');
        if (isset($_GET['list'])) {
            $items=$_GET['list'];
            $items=explode(',',$items);
            if(is_array($items))
            {
              $i = 1;
              foreach ($items as $item) {
                    $this->Cruiseline->id = $item;
                    $this->Cruiseline->saveField('sort',$i);
                    $i++;
              }
           	echo '<div id="successmsg">Successfully saved.</div>';
           	//make the success message disappear slowly
           	echo '<script type="text/javascript">$(document).ready(function(){ $("#successmsg").fadeOut(2000); });</script>';  
            
            }
        }
        die();
    }
    function banners(){
        
        $this->set('banners',$this->Banner->find('all'));
        if(isset($_POST['submit']))
        {
            //var_dump($_POST); die();
            $this->Banner->deleteAll(array('id >0 '));
            foreach($_POST['file'] as $k=>$v)
            {
                if($v!=""){
                    $source = APP."webroot/doc/temp/thumb/".$v;
                    $destination = APP."webroot/doc/thumb/".$v;
                    if(copy($source,$destination))
                        unlink(APP."webroot/doc/temp/thumb/".$v);
                    $arr['file'] =$v;
                    $arr['link'] = $_POST['link'][$k];
                    $arr['target'] = $_POST['target'][$k];
                    $this->Banner->create();
                    $this->Banner->save($arr);
                }
            }
           $this->Session->setFlash("Banner Save Successfull.");
        $this->redirect('');  
        }
       
        
    }
    function add_banner(){
        
        $this->set('banners',$this->Banner->find('all'));
        App::uses('Resizes', 'resize');
        
            if(isset($_POST['submit']))
            {
                //var_dump($_POST);
                foreach($_POST as $k=>$m)
                {
                   $arr[$k] = $m;
                }
                $this->Banner->create();
                $this->Banner->save($arr);
                
                if($_POST['nu']==1)
                {
                    $configs['x_axis'] = $_POST['x'];
                    $configs['y_axis'] = $_POST['y'];
                    $configs['image_library'] = 'gd2';
                    //$configs['library_path'] = '/usr/X11R6/bin/';
                    $configs['source_image'] = '/doc/'.$_POST['file'];
                    $configs['new_image'] = 'doc/original/'.$_POST['file'];
                    $configs['width'] = $_POST['w'];
                    $configs['height'] = $_POST['h'];
                    $configs['maintain_ratio'] = TRUE;
                    $img2 =  new Resizes();                                        
                    //$this->load->library('image_lib', $configs);
                    if ( !$img2->cropImage($_POST['w'],$_POST['x'],$_POST['y'],$_POST['w'],$_POST['h'],$configs['new_image'],$configs['source_image']))
                    {
                        echo "couldnot crop";
                    }
                    else
                    {
                        $img = new Resizes();
                        $img->load($this->webroot.'doc/original/'.$_POST['file']);
                        $img->resizeToWidth(200);
                        
                        	$img->save(APP.'webroot/doc/temp/thumb/'.$_POST['file']);
                        
                        //unlink($this->webroot.'doc/'.$_POST['file']);
                    }
                    //$this->redirect('banners');
                }
                
            }
        
    }
    
    function resources($id ="")
    {
        $this->loadModel('Resource');
        $this->loadModel('ResourcePdf');
        $this->set("resources",$this->Resource->find("all"));
        $this->set('id',$id);
        if($id!="" && $id != 'add')
        {
            $this->set('res',$this->Resource->findById($id));
            $this->set('pdfs',$this->ResourcePdf->find('all',array('conditions'=>array('resource_id'=>$id,'parent_id'=>0))));
            $this->set('rp',$this->ResourcePdf);
        }
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);die();
          foreach($_POST as $k=>$v)
          {
            
            if($id =="add")
                $new[$k] = trim($v);
            else
            {
                $this->Resource->id = $id;
                $this->Resource->saveField($k,trim($v));
            }
          }
          
          //var_dump($new);die();
          if($id =="add"){
            $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
            $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
            $new['slug'] = preg_replace($pattern, '_', (string) $new['title']);
             if($x = $this->Resource->find('first',array('conditions'=>array('slug'=>$new['slug']))))
                $new['slug']=$new['slug'].'_'.$x['News']['id'];
            $this->Resource->create();
            
              if($this->Resource->save($new))
              {
                $rid = $this->Resource->id;
                $this->Session->setFlash("Resource Center Added.");
                $this->redirect('resource_pdf/'.$rid."/add");
                
              } 
          }
          else
          {
            $this->Session->setFlash("Resource Center Updated.");
            $this->redirect("resource_pdf/".$id."/add");
          }
        }
    }
    function resource_delete($id)
    {
        $this->loadModel('ResourcePdf');
        $this->loadModel('Resource');
        if($this->Resource->delete(array('id'=>$id)))
        {
            $res = $this->ResourcePdf->find('all',array('conditions'=>array('resource_id'=>$id)));
            foreach($res as $r)
            {
                if($r['ResourcePdf']['pdf']!= "")
                unlink(APP.'webroot/pdf/'.$r['ResourcePdf']['pdf']);
            }
            $this->ResourcePdf->deleteAll(array('resource_id'=>$id));
            $this->Session->setFlash("Resource Center Deleted.");
            $this->redirect('resources');
        }
        
    }
    function pdf_delete($id)
    {
        $this->loadModel('ResourcePdf');
        $r = $this->ResourcePdf->findById($id);
        if($r['ResourcePdf']['parent_id']==0)
        {
            $res = $this->ResourcePdf->find('all',array('conditions'=>array('resource_id'=>$r['ResourcePdf']['resource_id'],'parent_id'=>$id)));
            foreach($res as $r)
            {
                if($r['ResourcePdf']['pdf']!= "")
                unlink(APP.'webroot/pdf/'.$r['ResourcePdf']['pdf']);
            }
            $this->ResourcePdf->deleteAll(array('parent_id'=>$id,'resource_id'=>$r['ResourcePdf']['resource_id']));
        }
        if($this->ResourcePdf->delete(array('id'=>$id)))
        {
           
            $this->Session->setFlash("Resource Pdf Deleted.");
            $this->redirect('resources');
        }
        
    }
    function resource_pdf($rid,$id = "")
    {
        $this->loadModel('ResourcePdf');
        $this->loadModel('Resource');
        $this->set("resources",$this->Resource->find("all"));
        $this->set('id',$id);
        $this->set('rid',$rid);
        if($rid !=""){
            $this->set('rid',$rid);
            $r = $this->Resource->findById($rid);
            $this->set('title',$r['Resource']['title']);
        }
        $this->set('pdfs',$this->ResourcePdf->find('all',array('conditions'=>array('resource_id'=>$rid,'parent_id'=>0))));
        if($id!= "" && $id!= 'add')
        {
            $this->set('c',$this->ResourcePdf->findById($id));
        }
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);
          foreach($_POST as $k=>$v)
          {
            
            if($id =="add")
            {
                $new[$k] = $v;
                
            } 
           else
            {
                $this->ResourcePdf->id = $id;
                $this->ResourcePdf->saveField($k,$v);
            }
          }
            
          if($id =="add"){
            
            $this->ResourcePdf->create();
          
              if($this->ResourcePdf->save($new))
              {
                $this->Session->setFlash("Pdf Added.");
                
              } 
          }
          $this->redirect("resources/".$rid);
        }
        
    }
    function savecrop($wdth=300)
    {
        App::uses('Resizes', 'resize');
        $configs['source_image'] = 'doc/temp/'.$_POST['file'];
        $arr = explode('.',$_POST['file']);
        $ext = end($arr);
        $rand = rand(10000000,99999999).'_'.rand(10000,99999).'.'.$ext;
        $configs['new_image'] = 'doc/temp/thumb/'.$rand;
        copy(APP.'webroot/doc/temp/'.$_POST['file'],APP."webroot/doc/temp/".$rand);
        
        $img =  new Resizes();
        if ($croped = $img->cropImage($_POST['w'],$_POST['x'],$_POST['y'],$_POST['w'],$_POST['h'],$configs['new_image'],$configs['source_image']))
        {
            //echo $croped;
            $img->load(APP.'webroot/doc/temp/thumb/'.$rand);
            $img->resizeToWidth($wdth);
          	$img->save(APP.'webroot/doc/temp/thumb/'.$rand);
            unlink(APP."webroot/doc/temp/".$_POST['file']);
			
           echo $rand;
        }
        else
        {
            echo "couldnot crop";
            
            unlink(APP.'webroot/doc/temp/'.$_POST['file']);
        } die();
         
    }
    function edit_banner($id)
    {
        App::uses('Resizes', 'resize');
        App::uses('Imagelib','Imaze');
            if(isset($_POST['title']))
            {
                foreach($_POST as $k=>$m)
                {
                   $this->Banner->saveField($k,$v);
                }
                
                if($_POST['nu']==1)
                {
                    $configs['x_axis'] = $_POST['x'];
                    $configs['y_axis'] = $_POST['y'];
                    $configs['image_library'] = 'gd2';
                    //$configs['library_path'] = '/usr/X11R6/bin/';
                    $configs['source_image'] = BASEPATH.'../images/portfolio/original/'.$this->input->post('image');
                    $configs['new_image'] = BASEPATH.'../images/portfolio/full/'.$this->input->post('image');
                    $configs['width'] = $_POST['w'];
                    $configs['height'] = $_POST['h'];
                    $configs['maintain_ratio'] = FALSE;
                    $img2 = new Imagelib($configs);                                        
                    //$this->load->library('image_lib', $configs);
                    if ( ! $img2->crop())
                    {
                        echo $img2->display_errors();
                    }
                    else
                    {
                        $img = new Resizes();
                        $img->load(BASEPATH.'../images/portfolio/full/'.$this->input->post('image'));
                        $img->resize(430,270);
                        $img->save(BASEPATH.'../images/portfolio/main/'.$this->input->post('image'));
                        
                        $img2 = new Resizes();
                        $img2->load(BASEPATH.'../images/portfolio/full/'.$this->input->post('image'));
                        $img2->resize(215,135);
                        $img2->save(BASEPATH.'../images/portfolio/thumb/'.$this->input->post('image'));
                        
                        unlink(BASEPATH.'../images/portfolio/full/'.$this->input->post('image'));
                    }
                    $this->redirect('banners');
                }
                
            }
            
        }
    
    function logout()
    {
        $this->Session->delete('admin');
        $this->redirect('/admin');
    }
    
    function pages()
    {
        
        $this->loadModel('Page');
        $q = $this->Page->find('all',array('conditions'=>array('parent'=>0)));
        return $q;
    }
    function getChild($id)
    {
        $this->loadModel('Page');
        return $this->Page->find('all',array('conditions'=>array('parent'=>$id)));
    }
    
    function editPage($id)
    {
        $this->loadModel('Page');
        $this->loadModel('Image');
        $q=$this->Page->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('content',$q);
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $this->Page->id = $id;
           
            $this->Page->save($arr);
            
             $this->Image->deleteAll(array('type_id'=>$id,'type'=>'pages'));
              foreach($_POST['images'] as $image)
              {
                    $img['file']= $image;
                    $img['type_id'] = $id;
                    $img['type'] = 'pages';
                    $this->Image->create();
                    if($this->Image->save($img))
                    {
                        $source1 = APP."webroot/doc/temp/thumb/".$image;
                        $destination1 = APP."webroot/doc/thumb1/".$image;
                        if(copy($source1,$destination1))
                        unlink(APP."webroot/doc/temp/thumb/".$image);
                    }
              }
            $this->Session->setFlash('Page updated successfully');
            $this->redirect('editPage/'.$id);
        }
    }
    function addPage($id)
    {
        
        //$q=$this->Page->find('first',array('conditions'=>array('id'=>$id)));
        //$this->set('content',$q);
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $arr['parent'] = $id;
            $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
            $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
            $arr['slug'] = preg_replace($pattern, '_', (string) $arr['title']);
            $this->loadModel('Page');
            if($this->Page->find('first',array('conditions'=>array('slug'=>$arr['slug']))))
            $arr['slug']=$arr['slug'].'_'.rand(100,999);
            $this->Page->create();           
            $this->Page->save($arr);
            $this->Session->setFlash('Page added successfully');
            $this->redirect('/dashboard/pages');
        }
    }
    function deletePage($id)
    {
        $this->loadModel('Page');
        $this->Page->delete($id);
        $this->redirect('pages');
    }
    function settings()
    {
        $this->loadModel('Admin');
        $this->set('a',$this->Admin->find('first'));
        if(isset($_POST['username']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $this->Admin->id = 1;
           
            $this->Admin->save($arr);
            $this->Session->setFlash('Updated successfully');
            $this->redirect('settings');
        }
    }
    
    function media($type=null)
    {
        $this->loadModel('Media');
        //$q = $this->Media->find('all', array('fields'=>'DISTINCT Media.media_type'));
//        $this->set('mtype',$q);
        if($type)
        {
            $q = $this->Media->find('all',array(
        'conditions'=>array('media_type = '=>$type),'order'=>'id DESC'));
        }
        else
        {
        $q = $this->Media->find('all');
        }
        $this->set('type',$type);
        $this->set('content',$q);
    }
    
    function viewMedia($type)
    {
        $this->loadModel('Media');
        $q = $this->Media->find('all', array(
        'conditions'=>array('media_type = '=>$type),
        'order'=>'id DESC'));
        $this->set('content',$q);
    }
    function editMedia($id)
    {
        $this->loadModel('Media');
        if(isset($_POST) && $_POST)
        {
            $this->Media->id = $id;
            $type = $_POST['media_type'];
            
            if($type=="Print" || $type == "Publication")
            {
                $f = 1;
                $_POST['youtube'] = '';
            }
            else
            {
                if($_POST['av'] == 'a'){
                $f = 1;
                $_POST['youtube'] = '';
                }
                else{                
                $f=0;
                $_POST['file'] = '';
                }
                
            }
            
            if($f==1 && isset($_FILES['file']) && $_FILES['file'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'mp3' || $ext == 'wav' || $ext == 'doc' || $ext == 'pdf' || $ext == 'docx')
                {
                    
                        $path = APP.'webroot/doc/'.$_POST['file'];
        			
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('editMedia/'.$id);
                }
                
            }
            $this->Media->save($_POST);
            $this->Session->setFlash('Media Successfully Edited!');
            $this->redirect('media');
        }
        $q = $this->Media->findById($id);
        $this->set('content',$q);
    }
    function addMedia()
    {
        $this->loadModel('Media');
        if(isset($_POST) && $_POST)
        {
            $this->Media->create();
            $type = $_POST['media_type'];
            
            if($type=="Print" || $type == "Publication")
            {
                $f = 1;
                $_POST['youtube'] = '';
            }
            else
            {
                if($_POST['av'] == 'a'){
                $f = 1;
                $_POST['youtube'] = '';
                }
                else{                
                $f=0;
                $_POST['file'] = '';
                }
                
            }
            
            if($f==1 && isset($_FILES['file']) && $_FILES['file'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'mp3' || $ext == 'wav' || $ext == 'doc' || $ext == 'pdf' || $ext == 'docx')
                {
                      $path = APP.'webroot/doc/'.$_POST['file'];
        			
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('addMedia');
                }
                
            }
            $this->Media->save($_POST);
            $this->Session->setFlash('Media Successfully Added!');
            $this->redirect('media');
        }
        
    }
    function deleteMedia($id,$type)
    {
        $this->loadModel('Media');
        $this->Media->delete($id);
        $this->redirect(array('controller' => 'dashboard', 'action' => 'viewMedia', $type));
    }
    
    
    function getMediaType()
    {
        $this->loadModel('Media');
        $q = $this->Media->find('all', array('fields'=>'DISTINCT Media.media_type'));
        return $q;
    }
    
    function addActImage()
    {
        CakePlugin::load('ImageCropResize');
        $this->loadModel('Image');
        $q = $this->Image->find('all');
        $this->set('content',$q);
        if(isset($_POST) && $_POST)
        {
               
            $this->Image->create();
            $this->Image->save(array('title'=>$_POST['title'],'file'=>$_POST['file']));
            
            
            $this->Session->setFlash('Image Successfully Added!');
            $this->redirect('/dashboard/pages');
        }
    }
    
    function deleteActImage($id)
    {
        $this->loadModel('Image');
        $this->Image->delete($id);
        $this->Session->setFlash('Image Successfully Deleted!');
        $this->redirect('/dashboard/addActImage');
    }
    
    function editActImage($id)
    {
        $this->loadModel('Image');
        //$q = $this->Image->find('all',array('conditions'=>array('id = '=>$id)));
         $q = $this->Image->findById($id);
        $this->set('content',$q);
        if(isset($_POST) && $_POST)
        {
            $old = $_POST['oldfile'];
            if(isset($_FILES['file']) && $_FILES['file']['name'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' || $ext == 'bmp')
                {
                    $oldpath = APP.'webroot/doc/'.$old;
                    unlink($oldpath);
                    $path = APP.'webroot/doc/'.$_POST['file'];
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                    $this->Image->id = $id;
                    $this->Image->save($_POST);
                       
                }
                else
                {
                    $this->Session->setFlash('Invalid File Extension');    
                    $this->redirect('editActImage/'.$id);
                }
            }
            else
            {
            $this->Image->id = $id;
            $this->Image->save($_POST);
            }
            $this->Session->setFlash('Image Activities Successfully Edited!');
            $this->redirect('addActImage');
        }
        
        
    }
    function upload()
        {
            //App::uses('Resizes', 'resize');
            //$img = new Resizes();
            $name = $_FILES['file']['name'];
            $arr = explode('.',$name);
            $ext = end($arr);
            $rand = rand(10000000,99999999).'_'.rand(10000,99999).'.'.$ext;
            move_uploaded_file($_FILES['file']['tmp_name'],APP.'webroot/doc/'.$rand);
            //$img->load(APP.'webroot/doc/'.$rand);
            //$img->resizeToWidth(700);
            
            //$config['height'] = 540;            
            //$this->load->library('image_lib', $config); 
            
            //$this->image_lib->resize();
            echo $rand;
            die();
        }
        function links()
        {
            $this->loadModel('Link');
            $q = $this->Link->find('all');
            $this->set('links',$q);
        }
        function addLink()
        {
            $this->loadModel('Link');
            if(isset($_POST)&&$_POST)
            {
                $this->Link->create();
                $this->Link->save($_POST);
                if(str_replace('http','',$_POST['links'])==$_POST['links'])
                $_POST['links'] = 'http://'.$_POST['links'];
                $this->Session->setFlash('Link Added Successfully');
                $this->redirect('links');
            }
        }
        function editLink($id)
        {
            $this->loadModel('Link');
            $this->set('link',$this->Link->findById($id));
            if(isset($_POST) && $_POST)
            {
                $this->Link->id = $id;
                if(str_replace('http','',$_POST['links'])==$_POST['links'])
                $_POST['links'] = 'http://'.$_POST['links'];
                $this->Link->save($_POST);
                $this->Session->setFlash('Link Added Successfully');
                $this->redirect('links');
            }
        }
        function del_img($mod,$file="",$id="")
        {
            $this->loadModel('Image');
            if($mod == 'news'){
                if($id!="")
                {
                    
                    $p = $this->Image->findById($id);
                    if($this->Image->delete(array('id'=>$id))&& file_exists(APP."webroot/doc/temp/".$p['Image']['file']))
                    {
                        unlink(APP."webroot/doc/temp/".$p['Image']['file']);
                        unlink(APP."webroot/doc/temp/thumb/".$p['Image']['file']);
                        echo "OK";
                    } 
                }
                else
                {
                        unlink(APP."webroot/doc/temp/".$file);
                        unlink(APP."webroot/doc/temp/thumb/".$file);
                         echo "OK";
                }
            }
             if($mod == 'pages'){
                if($id!="")
                {
                    
                    $p = $this->Image->findById($id);
                    if($this->Image->delete(array('id'=>$id))&& file_exists(APP."webroot/doc/temp/".$p['Image']['file']))
                    {
                        unlink(APP."webroot/doc/temp/".$p['Image']['file']);
                        unlink(APP."webroot/doc/temp/thumb/".$p['Image']['file']);
                        echo "OK";
                    } 
                }
                else
                {
                        unlink(APP."webroot/doc/temp/".$file);
                        unlink(APP."webroot/doc/temp/thumb/".$file);
                         echo "OK";
                }
            }
            if($mod == 'cruises'){
                if($id!="")
                {
                    
                    $p = $this->Image->findById($id);
                    if($this->Image->delete(array('id'=>$id))&& file_exists(APP."webroot/doc/temp/".$p['Image']['file']))
                    {
                        unlink(APP."webroot/doc/temp/".$p['Image']['file']);
                        unlink(APP."webroot/doc/temp/thumb/".$p['Image']['file']);
                        echo "OK";
                    } 
                }
                else
                {
                        unlink(APP."webroot/doc/temp/".$file);
                        unlink(APP."webroot/doc/temp/thumb/".$file);
                         echo "OK";
                }
            }
            die();
        }
        function del_pdf($mod,$id)
        {
            if($mod == 'page'){
                $this->loadModel('Page');
                $p = $this->Page->findById($id);
                $this->Page->id = $p['Page']['id'];
                if($this->Page->saveField('pdf',''))
                {
                    unlink(APP."webroot/pdf/".$p['Page']['pdf']);
                    echo "OK";
                }   
                
            }
            elseif($mod == 'resource')
            {
                $this->loadModel('ResourcePdf');
                $p = $this->ResourcePdf->findById($id);
                $this->ResourcePdf->id = $p['ResourcePdf']['id'];
                if($this->ResourcePdf->saveField('pdf',''))
                {
                    unlink(APP."webroot/pdf/".$p['ResourcePdf']['pdf']);
                    echo "OK";
                }     
                
            }
            die();
        }
        function newsletters($id=null,$page='info')
        {
            App::uses('CakeEmail', 'Network/Email');
            $whole =  Router::url(null,true);
                $base_url_arr = explode('/admin',$whole);
                $base_url = $base_url_arr['0'];
                $this->set('base_url',$base_url);
            if($id==0 || $id>0)
            $this->set('id_newsletter',$id);   
            $this->loadModel('Newsletter');
            if(isset($_POST['title'])&&$_POST['title'])
            {
                if($page=='info'){
                if($id)
                {
                    $this->Newsletter->id = $id;
                    $this->Newsletter->save($_POST);
                }   
                else
                {
                    $this->Newsletter->create();
                    $this->Newsletter->save($_POST);
                }
                
                }
                $id = $this->Newsletter->id;
                //die();
                $pages = array('info','preview','test','send');
                $key = array_search($page,$pages);
                //echo $key;die();
                if($page!='send')
                {
                    $key++;
                    $this->redirect('newsletters/'.$id.'/'.$pages[$key]);
                }
                else
                $this->redirect('newsletters');
                
            }
            if(isset($_POST['email']) && $_POST['email'])
            {
                $email = $_POST['email'];
                $emails = new CakeEmail();
                $emails->from(array('noreply@cruises.co.za'=>'CSI'));
            
                $emails->emailFormat('html');
                
                $emails->subject('CSI - Newsletter');
                
                
                $message=file_get_contents($base_url.'/newsletters/preview/'.$id);
                $emails->to($email);
                $emails->send($message);
                $this->Session->setFlash('Newsletter Succesfully Sent');
                
            }
            
            $this->set('page',$page);
            $q = $this->Newsletter->find('all',array('order'=>'id DESC'));
            $this->set('nl',$q);
            if($id){
            $q2 = $this->Newsletter->findById($id);
            $this->set('news',$q2);
            
            $news = $q2['Newsletter']['news_id'];
            
            
            
            
           
            } 
            if($page=='preview')
            {
                $this->render('newsletter_preview');
            }
            else $news = '';
            $this->loadModel('News');
            if($news)
            {
                //echo $news;die();
                $q3 = $this->News->find('all',array('conditions'=>array('id NOT IN('.$news.')')));
            }
            else
            $q3 = $this->News->find('all');
            $this->set('news_deals',$q3);
            if($page=='test')
            {
                $this->render('newsletter_test');
            }
        }
        
        function loadnews()
        {
            $this->layout = 'blank';
            $id = $_POST['id'];
            $this->loadModel('News');
            $q = $this->News->find('all',array('conditions'=>array('id IN('.$id.')'),'order'=>'id DESC'));
            
            $this->set('model',$q);
            $this->loadModel('Image');
            $this->set('img',$this->Image);
            
            
        }
        
        function cleanId($id)
        {
            
            $ids = $_POST['ids'];
            $arr = explode(',',$ids);
            $i=0;
            $ids = '';
            foreach($arr as $a)
            {
                
                if($a!=$id)
                {
                    $i++;
                    if($i==1)
                    $ids = $a;
                    else
                    $ids = $ids.','.$a;  
                }
            }
            echo $ids;die();
            
        }
        function loadNewsOption()
        {
             $this->loadModel('News');
            echo $ids = $_GET['ids'];
            $arr = explode(',',$ids);
            $id='';
            $i=0;
            foreach($arr as $a)
            {   
                    $i++;
                    if($i==1)
                    $id = $a;
                    else
                    $id = $ids.','.$a;                
            }
            $news = $id;
            if($news)
            {
                //echo $news;die();
                $q3 = $this->News->find('all',array('conditions'=>array('id NOT IN('.$news.')')));
            }
            else
            $q3 = $this->News->find('all');
            $i=0;
            echo "<option value=''>Choose News/Deals</option>";
            foreach($q3 as $n)
            {
                echo"<option value='".$n['News']['id']."'>".$n['News']['title']."</option>";
            }
            die();
            
        }
        
        function add_images($type, $id)
        {
            $this->layout = 'blank';
            $this->loadModel("Image");
            $this->set("images",$this->Image->find('all',array('conditions'=>array('type'=>$type,'type_id'=>$id))));
            
        }
        
}

?>