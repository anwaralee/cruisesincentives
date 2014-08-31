
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Cruise International</title>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js"> </script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/modernizr-2.6.2-respond-1.1.0.min.js"> </script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/main.js"> </script>
<link type="text/css" rel="stylesheet" href="<?php echo $this->webroot;?>css/style.css"/>
</head>

<body>
<div class="container">
<header>
<div class="top-head clearfix">
    <div class="logo-wrap">
    	<div class="logo">
        	<a href="#"> <img src="<?php echo $this->webroot;?>images/logo.png"> </a>
        </div>
        <div class="logo-quote">
        	Corporate meeting,incentives and charters <br />
            <div class="sub-quote"> The ultimate event destination </div>
        </div>
		</div><!--logo-wrap-->
        <div class="right-head-block">
            	<ul>
                	<li> <a href="#" class="register"> Register </a> 
                    <div class="register-form"> 
                    	<form method="post">
                        	<div class="form-title"> Regsiter for CSI <span class="close-btn"> </span> </div>
                            <div>
                            	<label> Name * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Surname * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Company * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Position * </label>
                                <input type="text" placeholder="Type something ...">
                            </div> <div>
                            	<label> Address * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Telephone * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Fax * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Email * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                            <div class="submit clearfix">
                            	<input type="button" class="close" value="Close">
                                <input type="submit" class="register_submti" value="Register">
                            </div>
                        </form>
                    </div> 
                    <div class="overlay"> </div>
                    </li>
                    <li> <a href="#" class="login"> Login </a> 
                     <div class="login-form"> 
                    	<form method="post">
                        	<div class="form-title"> Right side <span class="close-btn"> </span> </div>
                            <div>
                            	<label> Name * </label>
                                <input type="text" placeholder="Type something ...">
                            </div>
                             <div>
                            	<label> Password * </label>
                                <input type="password" placeholder="Type something ...">
                            </div>
                            <div class="submit clearfix">
                            	<input type="button" class="close" value="Close">
                                <input type="submit" class="register_submti" value="Login">
                            </div>
                        </form>
                    </div> 
                    <div class="overlay"> </div>
                    
                    </li>
                    <li class="search-list"> <a href="#" class="search"> Search this site </a> 
                    <div class="search-form">	
                        <form method="post">
                        	<input type="search"> 
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
        <li> <a href="cruise-international.html"> Cruise International Experiences </a> </li>
        <li> <a href="#"> Destinations </a> </li>
        <li> <a href="#"> Resource Center </a> </li>
         <li> <a href="cruise search.html"> Cruise Search </a> </li>
    </ul>
  </nav>
</header> <!--  header -->

<div id="main" class="clearfix">
	<?php echo $this->fetch('content'); ?>
</div> <!-- main end -->

<footer id="colophon">
	<ul>
    	<li> <a href="#">  legal </a> </li>
         <li> <a href="#">  Privacy </a> </li>
         <li> <a href="#">  copyrights </a> </li>
    </ul>
</footer>
</div>
</body>
</html>
