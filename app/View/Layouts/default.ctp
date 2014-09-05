<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<?php $seoTitle = (isset($seoTitle)&& $seoTitle!="")? $seoTitle : "Cruises Incentives";
        $seoDesc = (isset($seoDesc)&& $seoDesc!="")? $seoDesc : "Cruises Incentives";?>
<title><?php echo ucwords($seoTitle);?></title>
<meta name="description" content="<?php echo $seoDesc;?>"/>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js"> </script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/modernizr-2.6.2-respond-1.1.0.min.js"> </script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery.slicknav.js"> </script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/main.js"> </script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $this->webroot;?>css/style.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $this->webroot;?>css/responsive.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $this->webroot;?>css/slicknav.css"/>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
<header>
<div class="top-head clearfix">
    <div class="logo-wrap">
    	<div class="logo">
        	<a href="<?php echo $this->webroot;?>"> <img src="<?php echo $this->webroot;?>images/logo.png"> </a>
        </div>
        <div class="logo-quote">
        	Corporate meeting,incentives and charters <br />
            <div class="sub-quote"> The ultimate event destination </div>
        </div>
		</div><!--logo-wrap-->
        <div class="right-head-block">
            	<ul>
                <?php if(!$this->Session->read('user')){?>
                	<li> <a href="javascript:void(0);" class="register"> Register </a> 
                    <div class="register-form" style="display: none;"> 
                    	<form method="post" action="<?php echo $this->webroot."login/register";?>" >
                        	<div class="form-title"> Regsiter for CSI <span class="close-btn"> </span> </div>
                            <div>
                            	<label> Name * </label>
                                <input type="text" placeholder="Type something ..." name="name" required />
                            </div>
                             <div>
                            	<label> Surname * </label>
                                <input type="text" placeholder="Type something ..." name="surname" required/>
                            </div>
                             <div>
                            	<label> Company * </label>
                                <input type="text" placeholder="Type something ..." name="company" required/>
                            </div>
                            <div>
                            	<label> Password * </label>
                                <input type="password" placeholder="Type something ..." name="password" required id="password1" />
                            </div>
                            <div>
                            	<label> Confirm Password * </label>
                                <input type="password" placeholder="Type something ..."  id="password2" required/>
                            </div>
                             <div>
                            	<label> Position * </label>
                                <input type="text" placeholder="Type something ..." name="position" required/>
                            </div> <div>
                            	<label> Address * </label>
                                <input type="text" placeholder="Type something ..." name="address" required/>
                            </div>
                             <div>
                            	<label> Telephone * </label>
                                <input type="text" placeholder="Type something ..." name="telephone" required/>
                            </div>
                             <div>
                            	<label> Fax  </label>
                                <input type="text" placeholder="Type something ..." name="fax" />
                            </div>
                             <div>
                            	<label> Email * </label>
                                <input type="email" placeholder="Type something ..." name="email" id="email" required />
                            </div>
                            <div class="submit clearfix">
                            	<input type="button" class="close" value="Close" />
                                <input type="submit" name="submit" class="register_submti" value="Register" />
                            </div>
                        </form>
                    </div> 
                    <div class="overlay"> </div>
                    </li>
                    
                    <li> <a href="javascript:void(0);" class="login"> Login </a>
                     <div class="login-form" style="display: none;"> 
                    	<form method="post" id="loginform" action="<?php echo $this->webroot."login/userlogin"; ?>">
                        	<div class="form-title"> Login <span class="close-btn"> </span> </div>
                            <div>
                            	<label> Email * </label>
                                <input type="text" name="username" placeholder="Type something ..." id="username" required />
                                 <div id="usererror" style="display: none;"></div>
                            </div>
          
                             <div>
                            	<label> Password * </label>
                                <input type="password" name="password" placeholder="Type something ..." id="passwordz" required />
                                 <div id="passerror" style="display: none;"></div>
                            </div>
                            <div class="submit clearfix">
                                <div id="formerror" style="display: none;"></div>
                            	<input type="button" class="close" value="Close" />
                                <input type="button" class="register_submti loginbtn" value="Login" />
                                
                            </div>
                        </form>
                    </div> 
                    <div class="overlay"> </div>
                    
                    </li>
                    <?php }
                        else
                        {?>
                        <li>Welcome <?php echo $this->Session->read('name');?></li>
                         <li><a href="<?php echo $this->webroot;?>login/userlogout">Logout</a></li>
                         <input type="hidden" id="password1"/>  
                         <input type="hidden" id="password2"/>
                          
                    <?php
                        }?>
                    <li class="search-list"> <a href="#" class="search"> Search this site </a> 
                    <div class="search-form">	
                        <form method="post">
                        	<input type="search"/> 
                            <input type="button" value="Search" class="search-btn">
                        </form>
                    </div>
                    </li>
                </ul>
        </div><!--right-head-block-->
     </div> <!-- top-head -->
     
  <nav class="main-nav">
  	<ul class="clearfix">
    	<li> <a href="<?php echo $this->webroot;?>"> Home </a> </li>
        <li> <a href="<?php echo $this->webroot;?>pages/why_cruise"> Why cruise </a> </li>
        <li> <a href="<?php echo $this->webroot;?>cruisesinternational"> Cruise International Experiences </a> </li>
        <li> <a href="<?php echo $this->webroot;?>destinations"> Destinations </a> </li>
        <li> <a href="<?php echo $this->webroot;?>resources"> Resource Center </a> </li>
         <li> <a href="<?php echo $this->webroot;?>cruise_search"> Cruise Search </a> </li>
    </ul>
  </nav>
</header> <!--  header -->

<div id="main" class="clearfix">
<?php echo $this->Session->flash();?>
	<?php echo $this->fetch('content'); ?>
    
</div> <!-- main end -->

<footer id="colophon">
	<ul>
    	<li> <a href="<?php echo $this->webroot;?>pages/legal">  legal </a> </li>
         <li> <a href="<?php echo $this->webroot;?>pages/privacy">  Privacy </a> </li>
         <li> <a href="<?php echo $this->webroot;?>pages/copyright">  copyrights </a> </li>
    </ul>
</footer>
<script type="text/javascript">
window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
    document.getElementById("email").onchange = validateEmail;
    
}
function validateEmail(){
    $.ajax({
       url:'<?php echo $this->webroot;?>login/validateEmail',
       data:'email='+$('#email').val(),
       type:'post',
       success:function(res)
       {
        if(res=='1')
            document.getElementById("email").setCustomValidity("");
        else
            document.getElementById("email").setCustomValidity('Email already exists');
       } 
    });
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
    document.getElementById("password2").setCustomValidity(''); 
//empty string means no validation error
}
$(function(){
    $('#flashMessage').fadeOut(3000,'linear');
    $('.loginbtn').click(function(){
       var username = $('#username').val();
       var password = $('#passwordz').val();
        if(!username||!password){
       if(username=='')
       {
        $('#usererror').show();
         $('#usererror').text('Username can not be blank');
       }
       if(password=='')
       {
        $('#passerror').show();
        $('#passerror').text('Password can not be blank');
       }
       }
       else{
        $.ajax({
           url: '<?php echo $this->webroot;?>login/validate_user/'+username+'/'+password,
           success:function(res)
           {
            if(res=='1')
            $('#loginform').submit();
            else
           {
            $('#formerror').show();
            $('#formerror').text('Invalid Username or Password');
            $('#passerror').hide();
            $('#usererror').hide();
           } 
           }
           
        });
       }
       
       
    });
     
})
</script>
</div>
</body>
</html>
