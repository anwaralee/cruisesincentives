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
    function getuser()
    {
        $this->loadModel('User');
        if($this->Session->read('id'))
        {
            $id =$this->Session->read('id');
            $s = $this->User->findById($id);
            foreach($s['User'] as $k=>$v)
            {
                $arr[$k]=$v;
            }
            echo $s = json_encode($arr);
            
        }
        die();
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
    
    function validate_user($user,$pass)
    {
        $this->loadModel('User');
        $q = $this->User->find('first',array('conditions'=>array('email'=>$user,'password'=>$pass)));
        if($q)
        echo '1';
        else
        echo '0';
        die();
    }
    
    function userlogin()
    {
        $this->loadModel('User');
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if($q = $this->User->find('first',array('conditions'=>array('email'=>$user,'password'=>$pass))))
        {
            $this->Session->write('user',$user);
            $this->Session->write('name',$q['User']['name']);
            $this->Session->write('id',$q['User']['id']);
            $this->Session->setFlash("Login Sucessfull.");
        }
        $this->redirect('/requests');        
    }
    
    function userlogout()
    {
        $this->Session->delete('user');
        $this->Session->delete('name');
        $this->Session->delete('id');
        $this->Session->setFlash("Logout Sucessfull.");
        $this->redirect('/');
    }
    function register()
    {
        $this->loadModel('User');
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
                
            }
            $this->User->create();
            $this->User->save($arr);
            $this->Session->setFlash("User Registered.");   
        }
        $this->redirect("/");
        
    }
    function validateEmail()
    {
        $this->loadModel('User');
        $email = $_POST['email'];
        $q = $this->User->findByEmail($email);
        if($q)
        echo '0';
        else
        echo '1';
        die();
    }
    function get_province()
    {
        $this->loadModel('TblProvince');
        return $this->TblProvince->find('all');
    }
    function get_country()
    {
        $this->loadModel('Country');
        return $this->Country->find('all',array('order'=>'country_name'));
    }
    function get_destination()
    {
        $this->loadModel('Destination');
        return $this->Destination->find('all',array('order'=>'title'));
    }
}