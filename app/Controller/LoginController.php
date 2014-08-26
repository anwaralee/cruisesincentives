<?php class LoginController extends AppController
{
 
 function index()
    {
        $this->layout="login";
        if($this->Session->read('admin'))
        {
            $this->redirect('/admin'); 
        }
    }
    
    function login()
    {
        $this->layout="login";
        if($this->Session->read('admin'))
        {
            $this->redirect('/admin'); 
        }
    }
    
    function loginVerify()
    {
        $this->loadModel('Admin');
        if(isset($_POST) && $_POST)
        {
            $q=$this->Admin->find('first',array('conditions'=>array('username'=>$_POST['un'] , 'password'=>$_POST['pw'])));
            if($q)
            {
                $this->Session->write('admin','1');
            }
            $this->redirect('login');            
        }
        
    }
}