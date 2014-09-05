<?php
class RequestsController extends AppController
{
    var $components = array('Email');
    function index()
    {
        if(isset($_POST['submit']))
        {
            //var_dump($_FILES);die();
            $name = $_FILES['file']['name'];
            $arr = explode('.',$name);
            $ext = end($arr);
            $rand = rand(10000000,99999999).'_'.rand(10000,99999).'.'.$ext;
            move_uploaded_file($_FILES['file']['tmp_name'],APP.'webroot/request1/'.$rand);
            foreach($_POST as $k=>$v)
            {
                $arr[$k] =$v;
            }
            $arr['file'] = $rand;
            $arr['added_on'] = date('Y-m-d H:i:s');
            $this->Request->create();
            $this->Request->save($arr);
            $emails = new CakeEmail();
            $emails->from(array('noreply@cruisesgroupsincentives.co.za'=>'Cruise Incentives'));
        
            $emails->emailFormat('html');
            
            $emails->subject('New Request Proposal');
            
            
            $message='
            Hello,<br/>
            You have received a new request Proposal from cruisesgroupsincentives<br/><br/>
            <strong>Contact Information</strong><br/><br/>
            First Name:'.$arr['name'].'<br/>
            Last Name:'.$arr['surname'].'<br/>
           	Company: '.$arr['company'].' <br/>
            Title: '.$arr['title'].'<br/>
            Bussiness Phone: '.$arr['telephone'].'<br/>
            Email: '.$arr['email'].'<br/>
            City: '.$arr['city'].'<br/>
            Zipcode: '.$arr['zip'].'<br/>
            state: '.$arr['state'].'<br/>
      		country: '.$arr['country'].'<br/>
            How did you hear  about us ?: '.$arr['stat'].'<br/>
            <br/>
            <strong>Event information</strong> <br/><br/>
            Event Type: '.$arr['type'].'<br/>
            Date of Event: '.$arr['date'].'<br/>
       	    Number of Nights: '.$arr['night'].'<br/>
            Number of guest Rooms: '.$arr['rooms'].'<br/>
            Destination1 : '.$arr['dest1'].'<br/>
            Destination2 : '.$arr['dest2'].'<br/>
            Additional Information: '.$arr['info'];
            $emails->attachments(APP.'webroot/request1/'.$rand);  
            $emails->to('dalene@cruises.co.za');
            $emails->bcc('warriorbik@gmail.com');
            $emails->send($message);
            $this->Session->setFlash('Message sent successfully');
            $this->redirect('/');
        }
    }
    
    
}