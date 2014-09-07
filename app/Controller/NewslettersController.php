<?php
class NewslettersController extends AppController
{
    function preview($id)
    {
        $this->loadModel('Image');
        $this->set('img',$this->Image);
        $whole =  Router::url(null,true);
                $base_url_arr = explode('/newsletters',$whole);
                $base_url = $base_url_arr['0'];
                $this->set('base_url',$base_url);
        $this->loadModel('News');
        $this->layout = 'blank';
        $q = $this->Newsletter->findById($id);
        $this->set('nl',$q);
        if($q['Newsletter']['news_id'])
        $this->set('news',$this->News->find('all',array('conditions'=>array('id IN('.$q['Newsletter']['news_id'].')'))));
        else
        $this->set('news','');
    }
    
    function add()
    {
        if(isset($_POST))
        {
        $email = $_POST['email'];
        $this->loadModel('Subscriber');
        if($this->Subscriber->findByEmail($email))
        {
            echo '1';
        }
        else
        {
            $this->Subscriber->create();
            $this->Subscriber->save(array('email'=>$email));
            echo '0'; 
        }}
            
        die();
        
    }
    
    
}
?>