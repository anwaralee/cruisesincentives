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
    function banners(){
        
        $this->set('banners',$this->Banner->find('all'));
        
    }
    function add_banner(){
        
        $this->set('banners',$this->Banner->find('all'));
        App::uses('Resizes', 'resize');
        App::uses('Imagelib','Imaze');
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
    function savecrop()
    {
        App::uses('Resizes', 'resize');
        $configs['source_image'] = '/doc/'.$_POST['file'];
        $configs['new_image'] = 'doc/temp/'.$_POST['file'];
        $img =  new Resizes();
        if ($croped = $img->cropImage($_POST['w'],$_POST['x'],$_POST['y'],$_POST['w'],$_POST['h'],$configs['new_image'],$configs['source_image']))
        {
            //echo $croped;
            $img->load(APP.'webroot/doc/temp/'.$_POST['file']);
            $img->resizeToWidth(580);
          	$img->save(APP.'webroot/doc/temp/thumb/'.$_POST['file']);
           
			
           echo $_POST['file'];
        }
        else
        {
            echo "couldnot crop";
            
            //unlink($this->webroot.'doc/'.$_POST['file']);
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
        $this->set('pages',$q);
    }
    function getChild($id)
    {
        $this->loadModel('Page');
        return $this->Page->find('all',array('conditions'=>array('parent'=>$id)));
    }
    
    function editPage($id)
    {
        $this->loadModel('Page');
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
            $this->Session->setFlash('Page updated successfully');
            $this->redirect('/dashboard/pages');
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
}

?>